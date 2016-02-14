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
        'password' => 'required|min:8|max:255|confirmed',
        'password_confirmation' => 'required|min:8|max:255',
        'address' => 'required|min:2|max:255',
        'citizenship_country_id' => 'required',
        'residence_country_id' => 'required',
        'city' => 'required|min:2|max:255',
        'postal_code' => 'required|min:3|max:16',
        'province' => 'required|min:2|max:255',
        'terms' => 'accepted',
    );
    var $errors;

    public static function make() {
        return new Contractor();
    }

    public function countryResidence() {
        return $this->belongsTo('Model\Country', 'residence_country_id', 'country_id');
    }

    public function countryCitizenship() {
        return $this->belongsTo('Model\Country', 'citizenship_country_id', 'country_id');
    }

    public function currency() {
        return $this->belongsTo('Model\Currency');
    }

    public function rateType() {
        return $this->belongsTo('Model\RateType');
    }

    public function workSituation() {
        return $this->belongsTo('Model\WorkSituation', 'work_situation_id', 'work_situation_id');
    }

    public function consultingMarket() {
        return $this->belongsTo('Model\ConsultingMarket', 'consulting_market_id', 'consulting_market_id');
    }

    public function consultingRole() {
        return $this->belongsTo('Model\ConsultingRole', 'consulting_role_id', 'consulting_role_id');
    }

    public function experienceLevel() {
        return $this->belongsTo('Model\Experience', 'experience_level_id', 'experience_level_id');
    }

    public function expertiseArea() {
        return $this->belongsTo('Model\ExpertiseArea', 'expertise_area_id', 'expertise_area_id');
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
        $data->interviewsReceived = \Model\Interview::where('contractor_id', $contractorId)->where('status', 10)->where('parent_interview_id', 0)->count();
        $data->interviewsReplaced = \Model\Interview::where('contractor_id', $contractorId)->where('status', '>', 10)->where('parent_interview_id', '>', 0)->count();
        $data->interviewsAccepted = \Model\Interview::where('contractor_id', $contractorId)->where('status', 20)->count();
        $data->interviewsRefused = \Model\Interview::where('contractor_id', $contractorId)->where('status', 0)->count();
        $data->interviewsFeedback = \Model\Interview::where('contractor_id', $contractorId)->where('status', 30)->count();
        return $data;
    }

    public static function projectStatus() {
        $data = new \stdClass();
        $contractorId = \Session::get('contractor_id');
        $data->projectsActive = \Model\Project::where('contractor_id', $contractorId)->where('status', 1)->count();
        $data->projectsClosed = \Model\Project::where('contractor_id', $contractorId)->where('status', 0)->count();
        return $data;
    }

    public static function jobStatus() {
        $data = new \stdClass();
        $contractorId = \Session::get('contractor_id');
        $data->jobsApplied = 2; //\Model\Job::where('contractor_id', $contractorId)->count();
        return $data;
    }

    public static function getInterviewReceived() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', 10)->where('parent_interview_id', 0)->paginate(5);
    }

    public static function getInterviewReplaced() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', '>', 10)->where('parent_interview_id', '>', 0)->orderby('created_at','desc')->paginate(5);
    }

    public static function getInterviewAccepted() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', 20)->paginate(5);
    }

    public static function getInterviewRefused() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', 0)->paginate(5);
    }

    public static function getInterviewFeedback() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Interview::where('contractor_id', $contractorId)->where('status', 30)->paginate(5);
    }

    public static function getProjectActive() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Project::where('contractor_id', $contractorId)->where('status', 1)->paginate(5);
    }

    public static function getProjectClose() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Project::where('contractor_id', $contractorId)->where('status', 0)->paginate(5);
    }

    public static function getJobApplied() {
        $contractorId = \Session::get('contractor_id');
        return \Model\Project::where('contractor_id', $contractorId)->where('status', 0)->paginate(5);
    }

}
