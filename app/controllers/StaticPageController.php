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
    
    public function aboutUs() {
        $data = new stdClass();
        $this->layout->content = View::make('static.about-us')->with('data', $data);
    }

    
    public function contactUs() {
        $data = new stdClass();
        
        $this->layout->content = View::make('static.contact-us')->with('data', $data);
    }
    
    public function contactUsSend() {
        $input = Input::all();
        echo '<pre>';
        print_r($input);die;
    }

    
    public function helpFaq() {
        $data = new stdClass();
        $this->layout->content = View::make('static.help-faq')->with('data', $data);
    }


}
