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
    
}
