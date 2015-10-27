<?php

class AdminController extends BaseController {

    protected $layout = 'admin.master';

    public function login() {
        $data = new stdClass();
        return View::make('admin.login')->with('data', $data);
    }

    public function dashboard() {
        $data = new stdClass();
        $this->layout->content = View::make('admin.index')->with('data', $data);
    }

}
