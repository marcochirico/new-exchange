<?php

namespace Model;

class WorkSituation extends \Eloquent {

    protected $table = 'ne_work_situations';

    public static function make() {
        return new WorkSituation();
    }

}
