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
            $t->integer('industry_id')->unsigned();
            $t->integer('requirement_id')->unsigned();
            $t->string('name');
            $t->string('first_name');
            $t->string('last_name');
            $t->longText('address');
            $t->string('city');
            $t->string('country');
            $t->string('province');
            $t->string('postal_code');
            $t->string('email');
            $t->string('phone');
            $t->string('mobile');
            $t->string('fax');
            $t->string('username');
            $t->string('password');
            $t->string('reminder_token');
            $t->boolean('status');
            $t->timestamps();
            //foreign keys
//            $t->foreign('industry_id')->references('industry_id')->on('ne_industry_types')->onDelete('cascade')->onUpdate('cascade');
//            $t->foreign('contractor_id')->references('contractor_id')->on('ne_contractors')->onDelete('cascade')->onUpdate('cascade');
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
