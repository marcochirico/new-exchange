<?php

class ExpertiseAreaTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_expertise_areas')->delete();

        Model\ExpertiseArea::create(array('expertise_area' => 'Controlling', 'status' => 1));
        Model\ExpertiseArea::create(array('expertise_area' => 'Distributions', 'status' => 1));
        Model\ExpertiseArea::create(array('expertise_area' => 'Financials', 'status' => 1));
        Model\ExpertiseArea::create(array('expertise_area' => 'Manufactoring', 'status' => 1));
    }

}
