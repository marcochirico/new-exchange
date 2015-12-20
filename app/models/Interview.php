<?php

namespace Model;

class Interview extends \Eloquent {

    protected $table = 'ne_interviews';
    protected $primaryKey = 'interview_id';

    public static function make() {
        return new Interview();
    }

}
