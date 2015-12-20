<?php

namespace Model;

class Experience extends \Eloquent {

    protected $table = 'ne_experience_levels';

    public static function make() {
        return new Experience();
    }

}
