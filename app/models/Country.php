<?php

namespace Model;

class Country extends \Eloquent {

    protected $table = 'ne_countries';
    protected $primaryKey = 'country_id';

    public static function make() {
        return new Country();
    }

}
