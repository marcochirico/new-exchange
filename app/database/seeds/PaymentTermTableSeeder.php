<?php

class PaymentTermTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_payment_terms')->delete();

        Model\PaymentTerm::create(array('payment_term' => '15 Net', 'status' => 1));
        Model\PaymentTerm::create(array('payment_term' => '30 Net', 'status' => 1));
        Model\PaymentTerm::create(array('payment_term' => '45 Net', 'status' => 1));
    }

}
