<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeInterviewComments extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('ne_interview_comments', function($t) {
            $t->increments('comment_id');
            $t->integer('interview_id')->unsigned();
            $t->integer('client_id')->unsigned();
            $t->integer('contractor_id')->unsigned();
            $t->longText('comment');
            $t->timestamps();
            //foreign keys
            $t->foreign('interview_id')->references('interview_id')->on('ne_interviews')->onDelete('cascade')->onUpdate('cascade');
            $t->foreign('client_id')->references('client_id')->on('ne_clients')->onDelete('cascade')->onUpdate('cascade');
            $t->foreign('contractor_id')->references('contractor_id')->on('ne_contractors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('ne_interview_comments');
    }

}
