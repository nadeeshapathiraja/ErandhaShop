<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplyerCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplyer_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('supplyer_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('order_id')->nullable();
            $table->double('price')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('supplyer_costs');
    }
}
