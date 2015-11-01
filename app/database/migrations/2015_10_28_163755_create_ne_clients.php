<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeClients extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ne_clients', function($t) {
            $t->increments('client_id');
            $t->string('name');
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
        Schema::drop('ne_clients');
    }

}
