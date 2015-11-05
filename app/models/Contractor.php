<?php

namespace Model;

class Contractor extends \Eloquent {

    protected $table = 'ne_contractors';

    public static function make() {
        return new Contractor();
    }

}
