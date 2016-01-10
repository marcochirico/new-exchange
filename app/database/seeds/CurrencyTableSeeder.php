<?php

class CurrencyTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_currencies')->delete();

        Model\Currency::create(array('currency' => 'EUR', 'status' => 1));
        Model\Currency::create(array('currency' => 'GBP', 'status' => 1));
        Model\Currency::create(array('currency' => 'CHF', 'status' => 1));
        Model\Currency::create(array('currency' => 'AUD', 'status' => 1));
        Model\Currency::create(array('currency' => 'USD', 'status' => 1));
        Model\Currency::create(array('currency' => 'HKD', 'status' => 1));
        Model\Currency::create(array('currency' => 'CAD', 'status' => 1));
        Model\Currency::create(array('currency' => 'SGD', 'status' => 1));
        Model\Currency::create(array('currency' => 'JPY', 'status' => 1));
        Model\Currency::create(array('currency' => 'NZD', 'status' => 1));
    }

}
