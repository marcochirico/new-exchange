<?php

class TimezoneTableSeeder extends Seeder {

    public function run() {
        DB::table('ne_timezones')->delete();
        
        Model\Timezone::create(array('timezone' => 'UTC-11:00 - Midway Island, Samoa'));
        Model\Timezone::create(array('timezone' => 'UTC-10:00 - Hawaii-Aleutian'));
        Model\Timezone::create(array('timezone' => 'UTC-09:30 - Marquesas Islands'));
        Model\Timezone::create(array('timezone' => 'UTC-09:00 - Alaska'));
        Model\Timezone::create(array('timezone' => 'UTC-08:00 - Pacific Time, US & Canada'));
        Model\Timezone::create(array('timezone' => 'UTC-07:00 - Mountain Time, US & Canada'));
        Model\Timezone::create(array('timezone' => 'UTC-07:00 - Arizona'));
        Model\Timezone::create(array('timezone' => 'UTC-06:00 - Central Time, US & Canada'));
        Model\Timezone::create(array('timezone' => 'UTC-05:00 - Eastern Time, US & Canada'));
        Model\Timezone::create(array('timezone' => 'UTC-05:00 - Cuba'));
        Model\Timezone::create(array('timezone' => 'UTC-04:30 - Caracas'));
        Model\Timezone::create(array('timezone' => 'UTC-04:00 - Santiago'));
        Model\Timezone::create(array('timezone' => 'UTC-04:00 - Brazil'));
        Model\Timezone::create(array('timezone' => 'UTC-03:30 - Newfoundland'));
        Model\Timezone::create(array('timezone' => 'UTC-03:00 - Montevideo'));
        Model\Timezone::create(array('timezone' => 'UTC-03:00 - Buenos Aires'));
        Model\Timezone::create(array('timezone' => 'UTC-02:00 - Mid-Atlantic'));
        Model\Timezone::create(array('timezone' => 'UTC-01:00 - Cape Verde Is.'));
        Model\Timezone::create(array('timezone' => 'UTC - Greenwich Mean Time, London'));
        Model\Timezone::create(array('timezone' => 'UTC+01:00 - Amsterdam, Berlin, Rome, Stockholm, Vienna'));
        Model\Timezone::create(array('timezone' => 'UTC+01:00 - Brussels, Copenhagen, Madrid, Paris'));
        Model\Timezone::create(array('timezone' => 'UTC+01:00 - West Central Africa'));
        Model\Timezone::create(array('timezone' => 'UTC+02:00 - Beirut'));
        Model\Timezone::create(array('timezone' => 'UTC+02:00 - Cairo'));
        Model\Timezone::create(array('timezone' => 'UTC+03:00 - Moscow, St. Petersburg, Volgograd'));
        Model\Timezone::create(array('timezone' => 'UTC+03:30 - Tehran'));
        Model\Timezone::create(array('timezone' => 'UTC+04:00 - Abu Dhabi, Muscat'));
        Model\Timezone::create(array('timezone' => 'UTC+05:00 - Tashkent'));
        Model\Timezone::create(array('timezone' => 'UTC+05:30 - Chennai, Kolkata, Mumbai, New Delhi'));
        Model\Timezone::create(array('timezone' => 'UTC+05:45 - Kathmandu'));
        Model\Timezone::create(array('timezone' => 'UTC+06:00 - Astana, Dhaka'));
        Model\Timezone::create(array('timezone' => 'UTC+06:00 - Novosibirsk'));
        Model\Timezone::create(array('timezone' => 'UTC+06:30 - Yangon Rangoon'));
        Model\Timezone::create(array('timezone' => 'UTC+07:00 - Bangkok, Hanoi, Jakarta'));
        Model\Timezone::create(array('timezone' => 'UTC+08:00 - Beijing, Chongqing, Hong Kong, Urumqi'));
        Model\Timezone::create(array('timezone' => 'UTC+08:00 - Irkutsk, Ulaan Bataar'));
        Model\Timezone::create(array('timezone' => 'UTC+08:00 - Perth'));
        Model\Timezone::create(array('timezone' => 'UTC+08:45 - Eucla'));
        Model\Timezone::create(array('timezone' => 'UTC+09:00 - Osaka, Sapporo, Tokyo'));
        Model\Timezone::create(array('timezone' => 'UTC+09:00 - Seoul'));
        Model\Timezone::create(array('timezone' => 'UTC+09:00 - Yakutsk'));
        Model\Timezone::create(array('timezone' => 'UTC+09:30 - Adelaide'));
        Model\Timezone::create(array('timezone' => 'UTC+10:00 - Brisbane'));
        Model\Timezone::create(array('timezone' => 'UTC+10:00 - Hobart'));
        Model\Timezone::create(array('timezone' => 'UTC+10:30 - Lord Howe Island'));
        Model\Timezone::create(array('timezone' => 'UTC+11:00 - Solomon Is., New Caledonia'));
        Model\Timezone::create(array('timezone' => 'UTC+11:00 - Magadan'));
        Model\Timezone::create(array('timezone' => 'UTC+11:30 - Norfolk Island'));
        Model\Timezone::create(array('timezone' => 'UTC+12:00 - Anadyr, Kamchatka'));
        Model\Timezone::create(array('timezone' => 'UTC+12:00 - Fiji, Kamchatka, Marshall Is.'));
        Model\Timezone::create(array('timezone' => 'UTC+12:45 - Chatham Islands'));
        Model\Timezone::create(array('timezone' => 'UTC+13:00 - Nuku alofa'));
        
    }

}
