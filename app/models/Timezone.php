<?php

namespace Model;

class Timezone extends \Eloquent {

    protected $table = 'ne_timezones';

    public static function make() {
        return new Timezone();
    }

}
