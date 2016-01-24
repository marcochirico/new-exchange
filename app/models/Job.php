<?php

namespace Model;

class Job extends \Eloquent {

    protected $table = 'ne_jobs';
    protected $primaryKey = 'job_id';

    public static function make() {
        return new Job();
    }

    public static function getJobApplied() {
        return Job::paginate(5);
    }

}
