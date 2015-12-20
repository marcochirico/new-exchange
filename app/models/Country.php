<?php

namespace Model;

class Country extends \Eloquent {

    protected $table = 'ne_countries';

    public static function make() {
        return new Country();
    }

}
