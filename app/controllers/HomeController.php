<?php

class HomeController extends BaseController {

    protected $layout = 'master';

    public function index() {
//        $user = array('pippo' => 'pluto');
//        Event::fire('sendMail.clientInterviewRequired', array($user));
        
        $data = new stdClass();
        $this->layout->content = View::make('index')->with('data', $data);
    }

}
