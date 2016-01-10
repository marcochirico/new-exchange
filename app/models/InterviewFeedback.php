<?php

namespace Model;

class InterviewFeedback extends \Eloquent {

    protected $table = 'ne_interview_feedback';
    protected $primaryKey = 'feedback_id';

    public static function make() {
        return new InterviewFeedback();
    }
    
    public function interview() {
        return $this->belongsTo('Model\Interview');
    }
    
}
