<?php

namespace Model;

class Contractor extends \Eloquent {

    protected $table = 'ne_contractors';
    protected $primaryKey = 'contractor_id';

    public static function make() {
        return new Contractor();
    }

}
