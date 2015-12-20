<?php

namespace Model;

class RateType extends \Eloquent {

    protected $table = 'ne_rate_types';

    public static function make() {
        return new RateType();
    }

}
