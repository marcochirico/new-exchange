<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this->call('ClientTableSeeder');
        $this->call('ContractorTableSeeder');
        $this->call('IndustryTypeTableSeeder');
        $this->call('TimezoneTableSeeder');
        $this->call('CountryTableSeeder');
        $this->call('JobTableSeeder');
        $this->call('NewsTableSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
