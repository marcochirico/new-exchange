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
    
}
