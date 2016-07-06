<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('total_spots')->unsigned();
            $table->integer('rem_small')->unsigned();
            $table->integer('rem_med')->unsigned();
            $table->integer('rem_lrg')->unsigned();
            $table->integer('rem_super')->unsigned();
            $table->decimal('total_small', 5, 2)->unsigned();
            $table->decimal('total_med', 5, 2)->unsigned();
            $table->decimal('total_lrg', 5, 2)->unsigned();
            $table->decimal('total_super', 5, 2)->unsigned();
            $table->decimal('total', 5, 2)->unsigned();
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
        Schema::drop('lots');
    }
}
