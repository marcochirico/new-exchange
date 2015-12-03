<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeJobs extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_jobs', function($t) {
            $t->increments('job_id');
            $t->integer('client_id')->unsigned();
            $t->string('name');
            $t->string('reference');
            $t->string('location');
            $t->float('budget');
            $t->longText('description');
            $t->date('start');
            $t->date('end');
            $t->boolean('status');
            $t->timestamps();
            //foreign keys
            $t->foreign('client_id')->references('client_id')->on('ne_clients')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('ne_jobs');
    }

}
