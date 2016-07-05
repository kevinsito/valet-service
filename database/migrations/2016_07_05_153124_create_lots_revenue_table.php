<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsRevenueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots_revenue', function (Blueprint $table) {
            $table->integer('lot_id')->unsigned()->index();
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
        Schema::drop('lots_revenue');
    }
}
