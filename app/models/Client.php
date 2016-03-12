<?php

namespace Model;

class Client extends \Eloquent {

    protected $table = 'ne_clients';
    protected $primaryKey = 'client_id';
    protected $rules = array(
        'first_name' => 'required|min:2|max:255',
        'last_name' => 'required|min:2|max:255',
        'company_name' => 'required|min:2|max:255',
        'email' => 'required|email|unique:ne_clients|confirmed',
        'email_confirmation' => 'required|email',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8',
        'address' => 'required|min:2|max:255',
        'country_id' => 'required',
        'city' => 'required|min:2|max:255',
        'postal_code' => 'required|min:3|max:16',
        'province' => 'required|min:2|max:255',
        'terms' => 'accepted',
    );
    var $errors;

    public static function make() {
        return new Client();
    }

    public function validate($data) {

        $validator = \Validator::make($data, $this->rules);

        if ($validator->fails()) {
            $this->errors = $validator;
            return false;
        }

        return true;
    }

    public static function getNavbarName($index) {
        $obj = Client::find($index);
        return $obj->username;
    }

    public static function interviewStatus() {
        $data = new \stdClass();
        $clientId = \Session::get('client_id');
        $data->interviewsRequired = \Model\Interview::where('client_id', $clientId)->where('status', 10)->where('parent_interview_id', 0)->count();
        $data->interviewsReplaced = \Model\Interview::where('client_id', $clientId)->where('status', '>', 10)->where('parent_interview_id', '>', 0)->groupBy('parent_interview_id')->count();
        $data->interviewsAccepted = \Model\Interview::where('client_id', $clientId)->where('status', 20)->count();
        $data->interviewsFeedback = \Model\Interview::where('client_id', $clientId)->where('status', 30)->count();
        $data->interviewsRefused = \Model\Interview::where('client_id', $clientId)->where('status', 0)->count();

        return $data;
    }

    public static function projectStatus() {
        $data = new \stdClass();
        $clientId = \Session::get('client_id');
        $data->projectActive = \Model\Project::where('client_id', $clientId)->where('status', 1)->count();
        return $data;
    }

    public static function getInterviewRequired() {
        $clientId = \Session::get('client_id');
        return \Model\Interview::where('client_id', $clientId)->where('status', 10)->where('parent_interview_id', 0)->paginate(5);
    }

    public static function getInterviewReplaced() {
        $clientId = \Session::get('client_id');
        return \Model\Interview::where('client_id', $clientId)->where('status', '>', 10)->where('parent_interview_id', '>', 0)->orderby('created_at', 'desc')->paginate(5);
    }

    public static function getInterviewAccepted() {
        $clientId = \Session::get('client_id');
        return \Model\Interview::where('client_id', $clientId)->where('status', '=', 20)->paginate(5);
    }

    public static function getInterviewFeedback() {
        $clientId = \Session::get('client_id');
        return \Model\Interview::where('client_id', $clientId)->where('status', '=', 30)->paginate(5);
    }

    public static function getInterviewRefused() {
        $clientId = \Session::get('client_id');
        return \Model\Interview::where('client_id', $clientId)->where('status', 0)->paginate(5);
    }

    public static function getProjectActive() {
        $clientId = \Session::get('client_id');
        return \Model\Project::where('client_id', $clientId)->where('status', 1)->paginate(5);
    }

}
