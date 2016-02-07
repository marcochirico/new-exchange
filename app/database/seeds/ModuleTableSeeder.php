<?php

class ModuleTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_modules')->delete();

        Model\Module::create(array('module' => 'Module 1', 'status' => 1));
        Model\Module::create(array('module' => 'Module 2', 'status' => 1));
        Model\Module::create(array('module' => 'Module 3', 'status' => 1));
        Model\Module::create(array('module' => 'Module 4', 'status' => 1));
    }

}
