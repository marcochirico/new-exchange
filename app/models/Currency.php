<?php

namespace Model;

class Currency extends \Eloquent {

    protected $table = 'ne_currencies';
    protected $primaryKey = 'currency_id';

    public static function make() {
        return new Currency();
    }

}
