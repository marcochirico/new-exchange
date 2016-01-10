<?php

namespace Model;

class Project extends \Eloquent {

    protected $table = 'ne_projects';
    protected $primaryKey = 'project_id';

    public static function make() {
        return new Project();
    }

}
