<?php

class NewsTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_news')->delete();

        Model\News::create(array(
            'code' => '001',
            'source' => 'SAP feed',
            'excerpt' => 'Sap project new 001',
            'link' => 'http://www.google.com'
        ));

        Model\News::create(array(
            'code' => '002',
            'source' => 'SAP feed',
            'excerpt' => 'Sap project new 001',
            'link' => 'http://www.google.com'
        ));
    }

}
