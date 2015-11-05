<?php

namespace Model;

class IndustryType extends \Eloquent {

    protected $table = 'ne_industry_types';

    public static function make() {
        return new Model\IndustryType();
    }

}
