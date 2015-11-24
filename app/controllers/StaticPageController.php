<?php

class StaticPageController extends BaseController {

    protected $layout = 'master';

    public function howTo() {
        $data = new stdClass();
        $this->layout->content = View::make('static.how-to')->with('data', $data);
    }

    public function ourServices() {
        $data = new stdClass();
        $this->layout->content = View::make('static.our-services')->with('data', $data);
    }

    public function payments() {
        $data = new stdClass();
        $this->layout->content = View::make('static.payments')->with('data', $data);
    }

    public function legal() {
        $data = new stdClass();
        $this->layout->content = View::make('static.legal')->with('data', $data);
    }

}
