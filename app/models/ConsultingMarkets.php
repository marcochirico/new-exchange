<?php

namespace Model;

class ConsultingMarkets extends \Eloquent {

    protected $table = 'ne_consulting_markets';

    public static function make() {
        return new ConsultingMarkets();
    }

}
