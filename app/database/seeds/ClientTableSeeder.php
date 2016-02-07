<?php

class ClientTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_clients')->delete();

        Model\Client::create(array(
            'company_name' => 'Microtech Engineering S.r.l.',
            'industry_id' => 1,
            'requirement_id' => 1,
            'first_name' => 'Marco',
            'last_name' => 'Chirico',
            'address' => 'P.za Migliavacca 7',
            'city' => 'Cremona',
            'country_id' => 1,
            'province' => 'CR',
            'postal_code' => '20124',
            'email' => 'info@microtech-cr.com',
            'phone' => '0372450729',
            'mobile' => '3463002027',
            'fax' => '0372450729',
            'username' => 'microtech',
            'password' => sha1('microtech'),
            'reminder_token' => md5('microtech' . time()),
            'status' => true,
        ));

        Model\Client::create(array(
            'company_name' => 'NewLink Asia Ltd',
            'industry_id' => 1,
            'requirement_id' => 1,
            'first_name' => 'Andrea',
            'last_name' => 'Boccaccio',
            'address' => 'Via Roma 3',
            'city' => 'Milano',
            'country_id' => 1,
            'province' => 'MI',
            'postal_code' => '20124',
            'email' => 'andrea.boccaccio@me.com',
            'phone' => '',
            'mobile' => '',
            'fax' => '',
            'username' => 'newlinkasia',
            'password' => sha1('newlinkasia'),
            'reminder_token' => md5('newlinkasia' . time()),
            'status' => true,
        ));
    }

}
