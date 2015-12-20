<?php

namespace Model;

class PaymentTerm extends \Eloquent {

    protected $table = 'ne_payment_terms';

    public static function make() {
        return new PaymentTerm();
    }

}
