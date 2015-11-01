<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeContractors extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ne_contractors', function($t) {
            $t->increments('contractor_id');
            $t->string('first_name');
            $t->string('last_name');
            $t->string('username');
            $t->string('password');
            $t->string('reminder_token');
            $t->boolean('status');
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ne_contractors');
    }

}
