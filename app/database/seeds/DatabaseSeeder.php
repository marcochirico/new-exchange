<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
//        Eloquent::unguard();
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this->call('IndustryTypeTableSeeder');
        $this->call('CountryTableSeeder');
        $this->call('JobTableSeeder');
        $this->call('NewsTableSeeder');
        $this->call('TimezoneTableSeeder');
        $this->call('ClientTableSeeder');
        $this->call('ContractorTableSeeder');
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
