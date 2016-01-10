<?php

namespace Model;

class RateType extends \Eloquent {

    protected $table = 'ne_rate_types';
    protected $primaryKey = 'rate_type_id';

    public static function make() {
        return new RateType();
    }

}
