<?php

class ContractorController extends BaseController {

    protected $layout = 'master';

    public function login() {
        $data = new stdClass();
        $this->layout->content = View::make('contractor.login')->with('data', $data);
    }

    public function register() {
        $data = new stdClass();

        $data->countries = Utils\Helper::aggregateForSelect(Model\Country::where('status', 1)->get(), 'country_id', 'country');
        $data->workSituations = Utils\Helper::aggregateForSelect(Model\WorkSituation::where('status', 1)->get(), 'work_situation_id', 'work_situation');
        $data->consultingMarkets = Utils\Helper::aggregateForSelect(Model\ConsultingMarkets::where('status', 1)->get(), 'consulting_market_id', 'consulting_market');

        $this->layout->content = View::make('contractor.register')->with('data', $data);
    }

    public function save() {
        $input = Input::all();

        $contractorObj = Model\Contractor::make();

        if ($contractorObj->validate($input)) {
//
//            $password = Security\Helper::generatePassword($input['first_name'], $input['last_name']);
//
//            $clientObj->company_name = $input['company_name'];
//            $clientObj->first_name = $input['first_name'];
//            $clientObj->last_name = $input['last_name'];
//            $clientObj->industry_id = $input['industry_id'];
//            $clientObj->email = $input['email'];
//            $clientObj->phone = $input['phone'];
//            $clientObj->mobile = $input['mobile'];
//            $clientObj->fax = $input['fax'];
//            $clientObj->address = $input['address'];
//            $clientObj->country = $input['country'];
//            $clientObj->city = $input['city'];
//            $clientObj->postal_code = $input['postal_code'];
//            $clientObj->province = $input['province'];
//            $clientObj->requirement_id = $input['requirement_id'];
//            $clientObj->terms = $input['terms'] == 'on' ? true : false;
//            $clientObj->status = true;
//            $clientObj->username = Security\Helper::generateUsername($input['first_name'], $input['last_name']);
//            $clientObj->password = sha1($password);
//            $clientObj->reminder_token = Security\Helper::generateReminderToken($clientObj->username);
//            $clientObj->save();

            return Redirect::to('client/login');
        } else {
            $failed = $contractorObj->errors->messages()->all();

            Session::flash('contractor_register_errors', $failed);
            return Redirect::to('contractor/register');
        }
    }

    public function dashboard() {
        $data = new stdClass();

        $data->interviewStatus = Model\Contractor::interviewStatus();

        $this->layout->content = View::make('contractor.dashboard')->with('data', $data);
    }

    public function loginAuthorize() {
        $input = Input::all();

        //parse input
        $username = $input['username'];
        $password = $input['password'];

        $contractorObj = Model\Contractor::where('username', $username)
                ->where('password', sha1($password))
                ->first();

        if (isset($contractorObj->contractor_id)) {
            Session::set('contractor_id', $contractorObj->contractor_id);
            return Redirect::to('contractor/dashboard');
        } else {
            Session::flash('contractor_credential', '1');
            return Redirect::to('contractor/login');
        }

        return Redirect::to('contractor/login');
    }

    public function logout() {
        Session::forget('contractor_id');
        return Redirect::to('contractor/login');
    }

    public function interviewsReceived() {
        $data = new stdClass();
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->interviews = Model\Contractor::getInterviewReceived();
        $this->layout->content = View::make('contractor.interviewReceived')->with('data', $data);
    }

    public function interviewsReplaced() {
        $data = new stdClass();
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->interviews = Model\Contractor::getInterviewReplaced();
        $this->layout->content = View::make('contractor.interviewReplaced')->with('data', $data);
    }

    public function interviewsAccepted() {
        $data = new stdClass();
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->interviews = Model\Contractor::getInterviewAccepted();
        $this->layout->content = View::make('contractor.interviewAccepted')->with('data', $data);
    }

    public function interviewsRefused() {
        $data = new stdClass();
        $data->interviewStatus = Model\Contractor::interviewStatus();
        $data->interviews = Model\Contractor::getInterviewRefused();
        $this->layout->content = View::make('contractor.interviewRefused')->with('data', $data);
    }

}
