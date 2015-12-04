<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeModules extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::create('ne_modules', function($t) {
            $t->increments('module_id');
            $t->text('module');
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
        Schema::drop('ne_modules');
    }

}
