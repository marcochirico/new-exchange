<?php

namespace Model;

class Client extends \Eloquent {

    protected $table = 'ne_clients';

    public static function make() {
        return new Model\Client();
    }

}
