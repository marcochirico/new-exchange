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
        $this->call('AdminTableSeeder');
        $this->call('BillingCycleTableSeeder');
        $this->call('ConsultingMarketTableSeeder');
        $this->call('ConsultingRoleTableSeeder');
        $this->call('ExperienceLevelTableSeeder');
        $this->call('ExpertiseAreaTableSeeder');
        $this->call('ModuleTableSeeder');
        $this->call('PaymentMethodTableSeeder');
        $this->call('PaymentTermTableSeeder');
        $this->call('WorkSituationTableSeeder');
        $this->call('CurrencyTableSeeder');
        $this->call('IndustryTypeTableSeeder');
        $this->call('RateTypeTableSeeder');
        $this->call('CountryTableSeeder');
        $this->call('JobTableSeeder');
        $this->call('NewsTableSeeder');
        $this->call('TimezoneTableSeeder');
        $this->call('ClientTableSeeder');
        $this->call('ContractorTableSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

}
