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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_contractors', function($t) {
            $t->increments('contractor_id');
            $t->string('first_name');
            $t->string('middle_name');
            $t->string('last_name');
            $t->string('address');
            $t->integer('citizenship_country_id')->unsigned();
            $t->integer('residence_country_id')->unsigned();
            $t->string('city');
            $t->string('province');
            $t->string('postal_code');
            $t->string('email');
            $t->string('email_confirm');
            $t->string('phone');
            $t->string('mobile');
            $t->string('fax');
            $t->string('linkedin');
            $t->integer('work_situation_id')->unsigned();
            $t->integer('consulting_market_id')->unsigned();
            $t->integer('consulting_role_id')->unsigned();
            $t->integer('experience_level_id')->unsigned();
            $t->integer('expertise_area_id')->unsigned();
            $t->integer('module_id')->unsigned();
            $t->integer('rate_type_id')->unsigned();
            $t->integer('currency_id')->unsigned();
            $t->float('rate');
            $t->integer('payment_method_id')->unsigned();
            $t->integer('payment_term_id')->unsigned();
            $t->integer('billing_cycle_id')->unsigned();
            $t->string('business_name');
            $t->string('business_registration_number');
            $t->string('business_tax_number');
            $t->string('business_address');
            $t->integer('business_country_id')->unsigned();
            $t->string('business_city');
            $t->string('business_province');
            $t->string('business_postal_code');
            $t->string('username');
            $t->string('password');
            $t->string('reminder_token');
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
        Schema::drop('ne_contractors');
    }

}
