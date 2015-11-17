<?php

namespace Model;

class Interview extends \Eloquent {

    protected $table = 'ne_interviews';

    public static function make() {
        return new Model\Interview();
    }

}
