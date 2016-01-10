<?php

namespace Model;

class BillingCycle extends \Eloquent {

    protected $table = 'ne_billing_cycles';

    public static function make() {
        return new BillingCycle();
    }

}
