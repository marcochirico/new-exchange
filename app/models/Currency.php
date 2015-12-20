<?php

namespace Model;

class Currency extends \Eloquent {

    protected $table = 'ne_currencies';

    public static function make() {
        return new Currency();
    }

}
