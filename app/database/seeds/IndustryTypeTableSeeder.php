<?php

class IndustryTypeTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_industry_types')->delete();

        Model\IndustryType::create(array(
            'name' => 'Engineering',
            'status' => true,
        ));
        
        Model\IndustryType::create(array(
            'name' => 'Food',
            'status' => true,
        ));
        
        Model\IndustryType::create(array(
            'name' => 'HR & Recruitment',
            'status' => true,
        ));
    }

}
