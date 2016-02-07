<?php

class WorkSituationTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_work_situations')->delete();

        Model\WorkSituation::create(array('work_situation' => 'Employed (Contract)', 'status' => 1));
        Model\WorkSituation::create(array('work_situation' => 'Employed (Permanent)', 'status' => 1));
        Model\WorkSituation::create(array('work_situation' => 'Searching', 'status' => 1));
    }

}
