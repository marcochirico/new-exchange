<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NeInterviewFeedback extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_interview_feedback', function($t) {
            $t->increments('feedback_id');
            $t->integer('interview_id')->unsigned();
            $t->longtext('feedback');
            $t->boolean('status');
            $t->timestamps();
            //foreign key
            $t->foreign('interview_id')->references('interview_id')->on('ne_interviews')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('ne_interview_feedback');
    }

}
