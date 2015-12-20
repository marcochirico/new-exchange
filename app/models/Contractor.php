<?php

namespace Model;

class Contractor extends \Eloquent {

    protected $table = 'ne_contractors';
    protected $primaryKey = 'contractor_id';
    protected $rules = array(
        'first_name' => 'required|min:2|max:255',
        'last_name' => 'required|min:2|max:255',
        'email' => 'required|email|unique:ne_clients|confirmed',
        'email_confirmation' => 'required|email',
        'address' => 'required|min:2|max:255',
        'country' => 'required|min:2|max:255',
        'city' => 'required|min:2|max:255',
        'postal_code' => 'required|min:3|max:16',
        'province' => 'required|min:2|max:255',
        'terms' => 'accepted',
    );
    var $errors;

    public static function make() {
        return new Contractor();
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
        $obj = Contractor::find($index);
        return $obj->username;
    }

    public static function interviewStatus() {
        $data = new \stdClass();
        $contractorId = \Session::get('contractor_id');
        $data->interviewsReceived = \Model\Interview::where('contractor_id', $contractorId)->where('status', 1)->where('parent_interview_id', 0)->count();
        $data->interviewsReplaced = \Model\Interview::where('contractor_id', $contractorId)->where('status', 1)->where('parent_interview_id', '>', 0)->count();
        $data->interviewsAccepted = \Model\Interview::where('contractor_id', $contractorId)->where('status', '>', 1)->count();
        $data->interviewsRefused = \Model\Interview::where('contractor_id', $contractorId)->where('status', 0)->count();

        return $data;
    }

    public static function getInterviewReceived() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', 1)->where('parent_interview_id', 0)->paginate(5);
    }

    public static function getInterviewReplaced() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', 1)->where('parent_interview_id', '>', 0)->paginate(5);
    }

    public static function getInterviewAccepted() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', '>', 1)->paginate(5);
    }

    public static function getInterviewRefused() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', 0)->paginate(5);
    }

}
