<?php

class ContractorController extends BaseController {

    protected $layout = 'master';

    public function login() {
        $data = new stdClass();
        $this->layout->content = View::make('contractor.login')->with('data', $data);
    }

    public function register() {
        $data = new stdClass();
        $this->layout->content = View::make('contractor.register')->with('data', $data);
    }

    public function dashboard() {
        $data = new stdClass();
        $this->layout->content = View::make('contractor.dashboard')->with('data', $data);
    }

    public function loginAuthorize() {
        $input = Input::all();

        if (Session::has('_token') && isset($input['_token'])) {
            //check token
            if ($input['_token'] == Session::get('_token')) {
                //parse input
                $username = $input['username'];
                $password = $input['password'];

                $contractorObj = Model\Contractor::where('username', $username)
                        ->where('password', sha1($password))
                        ->first();
                
                if (isset($contractorObj->contractor_id)) {
                    Session::set('contract_id', $contractorObj->client_id);
                    return Redirect::to('client/dashboard');
                } else {
                    Session::flash('contractor_credential', '1');
                    return Redirect::to('contractor/login');
                }
            }
        }

        $data = new stdClass();
        $this->layout->content = View::make('contractor.login')->with('data', $data);
    }

}
