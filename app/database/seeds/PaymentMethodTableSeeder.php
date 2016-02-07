<?php

class PaymentMethodTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_payment_methods')->delete();

        Model\PaymentMethod::create(array('payment_method' => 'Cheque', 'status' => 1));
        Model\PaymentMethod::create(array('payment_method' => 'Paypal', 'status' => 1));
        Model\PaymentMethod::create(array('payment_method' => 'Postal Account', 'status' => 1));
        Model\PaymentMethod::create(array('payment_method' => 'Wire Transfer', 'status' => 1));
    }

}
