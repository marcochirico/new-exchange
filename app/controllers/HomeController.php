<?php

class HomeController extends BaseController {

    protected $layout = 'master';

    public function index() {
//        $user = array('pippo' => 'pluto');
//        Event::fire('sendMail.clientInterviewRequired', array($user));

        $data = new stdClass();


        $fetchGroupedData = DB::table('ne_contractors as a')
                ->join('ne_consulting_markets as b', 'a.consulting_market_id', '=', 'b.consulting_market_id')
                ->join('ne_consulting_roles as c', 'a.consulting_role_id', '=', 'c.consulting_role_id')
                ->join('ne_currencies as d', 'a.currency_id', '=', 'd.currency_id')
                ->groupBy('b.consulting_market_id', 'c.consulting_role_id', 'd.currency_id')
                ->select(DB::raw('SUM(a.rate) as rating'), 'b.consulting_market', 'c.consulting_role', 'd.currency')
                ->get();

        $realTimeRatesDashboardArr = array();
        foreach ($fetchGroupedData as $row) {
            $realTimeRatesDashboardArr[$row->consulting_market][$row->consulting_role][$row->currency] = $row->rating;
        }

//        echo '<pre>';
//        print_r($realTimeRatesDashboardArr);
//        die;
        /*
         * 
          SELECT SUM(a.rate), b.consulting_market, c.consulting_role, d.currency FROM ne_contractors a LEFT JOIN ne_consulting_markets b ON a.consulting_market_id = b.consulting_market_id LEFT JOIN ne_consulting_roles c ON a.consulting_role_id = c.consulting_role_id LEFT JOIN ne_currencies d ON a.currency_id = d.currency_id GROUP BY b.consulting_market_id, c.consulting_market_id, d.currency_id
         */

        $data->dashboard = $realTimeRatesDashboardArr;
        $this->layout->content = View::make('index')->with('data', $data);
    }

    public function testEmail() {
        $data = new stdClass();
        $data->contractor_id = 5;
        Event::fire('sendMail.contractorRegistration', array($data));
        
        die('test-email');
    }

}
