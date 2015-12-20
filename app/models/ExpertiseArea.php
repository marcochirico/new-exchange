<?php

namespace Model;

class ExpertiseArea extends \Eloquent {

    protected $table = 'ne_expertise_areas';

    public static function make() {
        return new ExpertiseArea();
    }

}
