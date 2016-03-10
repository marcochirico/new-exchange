<?php

class AdminTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_admin')->delete();

        Model\User::create(array('email' => 'info@microtech-cr.com', 'password' => Hash::make('microtech')));
    }

}
