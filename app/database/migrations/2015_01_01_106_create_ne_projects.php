<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeProjects extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_projects', function($t) {
            $t->increments('project_id');
            $t->integer('interview_id')->unsigned();
            $t->integer('client_id')->unsigned();
            $t->integer('contractor_id')->unsigned();
            $t->integer('billing_cycle_id')->unsigned();
            $t->date('date_start');
            $t->string('days');
            $t->float('rate');
            $t->char('status');
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
        Schema::drop('ne_projects');
    }

}
