<?php

class ClientController extends BaseController {

    protected $layout = 'master';

    public function login() {
        $data = new stdClass();
        $this->layout->content = View::make('client.login')->with('data', $data);
    }

    public function register() {
        $data = new stdClass();
        $this->layout->content = View::make('client.register')->with('data', $data);
    }

    public function dashboard() {
        $data = new stdClass();
        $this->layout->content = View::make('client.dashboard')->with('data', $data);
    }

    public function loginAuthorize() {
        $input = Input::all();
        if (Session::has('_token') && isset($input['_token'])) {
            //check token
            if ($input['_token'] == Session::get('_token')) {
                //parse input
                $username = $input['username'];
                $password = $input['password'];

                $clientObj = Model\Client::where('username', $username)
                        ->where('password', sha1($password))
                        ->first();
                
                if (isset($clientObj->client_id)) {
                    Session::set('client_id', $clientObj->client_id);
                    return Redirect::to('client/dashboard');        
                } else {
                    Session::flash('client_credential', '1');
                    return Redirect::to('client/login');
                }
            }
        }

        $data = new stdClass();
        $this->layout->content = View::make('client.login')->with('data', $data);
    }

}
