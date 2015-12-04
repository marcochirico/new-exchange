<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeCountries extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_countries', function($t) {
            $t->increments('country_id');
            $t->string('code');
            $t->string('country');
            $t->boolean('status');
            $t->timestamps();
        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('ne_countries');
    }

}
