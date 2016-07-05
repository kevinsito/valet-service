<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('l_name');
            $table->string('gender');
            $table->integer('age')->unsigned();
            $table->integer('times_parked')->unsigned();
            $table->integer('total_duration')->unsigned();
            $table->integer('avrg_duration')->unsigned();
            $table->decimal('total_charged', 5, 2)->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
