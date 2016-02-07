<?php

class BillingCycleTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_billing_cycles')->delete();

        Model\BillingCycle::create(array('billing_cycle' => 'Weekly', 'status' => 1));
        Model\BillingCycle::create(array('billing_cycle' => 'Bi-Weekly', 'status' => 1));
        Model\BillingCycle::create(array('billing_cycle' => 'Montly', 'status' => 1));
    }

}
