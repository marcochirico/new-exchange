<?php

namespace Model;

class ConsultingMarket extends \Eloquent {

    protected $table = 'ne_consulting_markets';

    public static function make() {
        return new ConsultingMarket();
    }

}
