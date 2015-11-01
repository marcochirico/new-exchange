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
        Schema::create('ne_interviews', function($t) {
            $t->increments('interview_id');
            $t->integer('client_id')->unsigned();
            $t->integer('contractor_id')->unsigned();
            $t->boolean('status');
            $t->timestamps();
            //foreign keys
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
        Schema::drop('ne_interviews');
    }

}
