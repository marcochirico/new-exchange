<?php

class ContractorTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_contractors')->delete();

        Model\Contractor::create(array(
            'first_name' => 'Marco',
            'last_name' => 'Chirico',
            'username' => 'microtech',
            'password' => sha1('microtech'),
            'reminder_token' => md5('microtech' . time()),
            'status' => true,
        ));

        Model\Contractor::create(array(
            'first_name' => 'Andrea',
            'last_name' => 'Boccaccio',
            'username' => 'newlinkasia',
            'password' => sha1('newlinkasia'),
            'reminder_token' => md5('newlinkasia' . time()),
            'status' => true,
        ));
        
        Model\Contractor::create(array(
            'first_name' => 'Michael',
            'last_name' => 'Torst',
            'username' => 'michael',
            'password' => sha1('michael'),
            'reminder_token' => md5('newlinkasia' . time()),
            'status' => true,
        ));
        
        Model\Contractor::create(array(
            'first_name' => 'Joseph',
            'last_name' => 'Cruger',
            'username' => 'joseph',
            'password' => sha1('joseph'),
            'reminder_token' => md5('newlinkasia' . time()),
            'status' => true,
        ));
    }

}
