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
        $rules = array(
            'first_name' => 'required|min:2|max:255',
            'last_name' => 'required|min:2|max:255',
            'email' => 'required|min:2|max:255|email',
            'subject' => 'required|min:2|max:255',
            'message' => 'required|min:2',
        );

        $validator = \Validator::make($input, $rules);

        if ($validator->fails()) {
            $failed = $validator->messages();

            Session::flash('contact_us_errors', $failed);
            return Redirect::to('contact-us')->withInput();
        }

        //send mail
        $data = new stdClass();
        $data->message = $input;
        Event::fire('sendMail.contactUs', array($data));
        return Redirect::to('contact-us/confirm');
    }

    public function contactUsConfirm() {
        $data = new stdClass();

        $this->layout->content = View::make('static.contact-us-confirm')->with('data', $data);
    }

    public function helpFaq() {
        $data = new stdClass();
        $this->layout->content = View::make('static.help-faq')->with('data', $data);
    }

}
