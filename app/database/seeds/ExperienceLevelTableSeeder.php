<?php

class ExperienceLevelTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_experience_levels')->delete();

        Model\Experience::create(array('experience_level' => '1-3 Years', 'status' => 1));
        Model\Experience::create(array('experience_level' => '4-7 Years', 'status' => 1));
        Model\Experience::create(array('experience_level' => '8-15 Years', 'status' => 1));
        Model\Experience::create(array('experience_level' => 'Over 15 Years', 'status' => 1));
    }

}
