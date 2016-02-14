<?php

namespace Model;

class Timezone extends \Eloquent {

    protected $table = 'ne_timezones';
    protected $primaryKey = 'timezone_id';

    public static function make() {
        return new Timezone();
    }

}
