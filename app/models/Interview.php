<?php

namespace Model;

class Interview extends \Eloquent {

    protected $table = 'ne_interviews';
    protected $primaryKey = 'interview_id';
    protected $rules = array(
        'interview_request.proposed_date' => 'required|min:10|max:10',
        'interview_request.proposed_time' => 'required',
        'interview_request.timezone_id' => 'required',
        'interview_request.proposed_location' => 'required',
        'interview_request.proposed_rate' => 'required',
        'interview_request.job_reference' => 'required'
    );

    var $errors;

    public static function make() {
        return new Interview();
    }

    public function validate($data) {

        $validator = \Validator::make($data, $this->rules);

        if ($validator->fails()) {
            $this->errors = $validator;
            return false;
        }

        return true;
    }

    public function contractor() {
        return $this->belongsTo('Model\Contractor');
    }

    public function client() {
        return $this->belongsTo('Model\Client');
    }

    public function timezone() {
        return $this->belongsTo('Model\Timezone');
    }

}
