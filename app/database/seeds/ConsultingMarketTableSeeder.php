<?php

class ConsultingMarketTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_consulting_markets')->delete();

        Model\ConsultingMarket::create(array('consulting_market' => 'Microsoft', 'status' => 1));
        Model\ConsultingMarket::create(array('consulting_market' => 'Oracle', 'status' => 1));
        Model\ConsultingMarket::create(array('consulting_market' => 'SAP', 'status' => 1));
    }

}
