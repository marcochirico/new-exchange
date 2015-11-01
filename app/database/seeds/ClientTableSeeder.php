<?php

class ClientTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_clients')->delete();

        Model\Client::create(array(
            'name' => 'Microtech Engineering S.r.l.',
            'username' => 'microtech',
            'password' => sha1('microtech'),
            'reminder_token' => md5('microtech' . time()),
            'status' => true,
        ));

        Model\Client::create(array(
            'name' => 'New Link Asia Ltd',
            'username' => 'newlinkasia',
            'password' => sha1('newlinkasia'),
            'reminder_token' => md5('newlinkasia' . time()),
            'status' => true,
        ));
    }

}
