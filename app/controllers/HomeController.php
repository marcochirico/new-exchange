<?php

class HomeController extends BaseController {

    protected $layout = 'master';

    public function index() {
        $data = new stdClass();
        $this->layout->content = View::make('index')->with('data',$data);
    }

}
