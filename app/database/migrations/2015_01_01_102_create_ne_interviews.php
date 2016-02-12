<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeInterviews extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_interviews', function($t) {
            $t->increments('interview_id');
            $t->integer('client_id')->unsigned();
            $t->integer('contractor_id')->unsigned();
            $t->integer('parent_interview_id')->unsigned();
            $t->integer('timezone_id')->unsigned();
            $t->datetime('date');
            $t->string('location');
            $t->float('rate');
            $t->text('reference');
            $t->longtext('preview');
            $t->char('feedback');
            $t->longtext('feedback_description');
            $t->date('project_start_date');
            $t->integer('project_duration');
            $t->float('project_rate');
            $t->integer('project_payment_method_id')->unsigned();
            $t->integer('project_billing_cycle_id')->unsigned();
            $t->char('status');
            $t->timestamps();
            //foreign keys
            $t->foreign('client_id')->references('client_id')->on('ne_clients')->onDelete('cascade')->onUpdate('cascade');
            $t->foreign('contractor_id')->references('contractor_id')->on('ne_contractors')->onDelete('cascade')->onUpdate('cascade');
            $t->foreign('timezone_id')->references('timezone_id')->on('ne_timezones')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('ne_interviews');
    }

}
