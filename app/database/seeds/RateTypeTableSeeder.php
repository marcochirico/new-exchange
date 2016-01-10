<?php

class RateTypeTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_rate_types')->delete();
        
        Model\RateType::create(array('rate_type' => 'Daily', 'status' => 1));
        Model\RateType::create(array('rate_type' => 'Hourly', 'status' => 1));
    }

}
