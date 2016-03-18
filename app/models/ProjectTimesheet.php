<?php

namespace Model;

class ProjectTimesheet extends \Eloquent {

    protected $table = 'ne_project_timesheets';
    protected $primaryKey = 'timesheet_id';

    public static function make() {
        return new ProjectTimesheet();
    }

    public function project() {
        return $this->belongsTo('Model\Project');
    }

}
