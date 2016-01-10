<?php

namespace Model;

class Interview extends \Eloquent {

    protected $table = 'ne_interviews';
    protected $primaryKey = 'interview_id';

    public static function make() {
        return new Interview();
    }

    public function feedback() {
        return $this->hasOne('Model\InterviewFeedback');
    }

    public function contractor() {
        return $this->belongsTo('Model\Contractor');
    }

    public function client() {
        return $this->belongsTo('Model\Client');
    }

}
