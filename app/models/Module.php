<?php

namespace Model;

class Module extends \Eloquent {

    protected $table = 'ne_modules';

    public static function make() {
        return new Module();
    }

}
