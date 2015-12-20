<?php

namespace Model;

class PaymentMethod extends \Eloquent {

    protected $table = 'ne_payment_methods';

    public static function make() {
        return new PaymentMethod();
    }

}
