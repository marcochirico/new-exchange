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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_clients', function($t) {
            $t->increments('client_id');
            $t->integer('industry_id')->unsigned();
            $t->integer('requirement_id')->unsigned();
            $t->string('company_name');
            $t->string('first_name');
            $t->string('last_name');
            $t->longText('address');
            $t->string('city');
            $t->string('country_id');
            $t->string('province');
            $t->string('postal_code');
            $t->string('email');
            $t->string('phone');
            $t->string('mobile');
            $t->string('fax');
            $t->boolean('terms');
            $t->string('username');
            $t->string('password');
            $t->string('reminder_token');
            $t->boolean('status');
            $t->timestamps();
            //foreign keys
            $t->foreign('industry_id')->references('industry_id')->on('ne_industry_types')->onDelete('cascade')->onUpdate('cascade');
//            $t->foreign('country_id')->references('country_id')->on('ne_countries')->onDelete('cascade')->onUpdate('cascade');
//            $t->foreign('requirement_id')->references('requirement_id')->on('ne_requirements')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('ne_clients');
    }

}
