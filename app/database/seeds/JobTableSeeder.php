<?php

class JobTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_jobs')->delete();

        Model\Job::create(array(
            'client_id' => 1,
            'name' => 'Senior Java Developer',
            'reference' => 'Constantin Torker',
            'location' => 'Chicago, IL',
            'budget' => '13500',
            'description' => 'CRM Platform Implementation',
            'start' => '2015-12-01',
            'end' => '2015-12-20',
            'status' => true,
        ));

        Model\Job::create(array(
            'client_id' => 1,
            'name' => 'Senior PHP Developer',
            'reference' => 'Mikael Luois',
            'location' => 'San Francisco, CA',
            'budget' => '5700',
            'description' => 'Custom CMS development',
            'start' => '2015-12-01',
            'end' => '2015-12-20',
            'status' => true,
        ));
        
    }

}
