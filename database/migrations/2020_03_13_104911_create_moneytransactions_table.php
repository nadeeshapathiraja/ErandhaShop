<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneytransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneytransactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('item_id')->nullable()->unsigned();
            $table->double('total_clearance')->nullable();
            $table->double('value_with_offer')->nullable();
            $table->double('total_cost')->nullable();
            $table->double('rs_value')->nullable();
            $table->double('product_cost')->nullable();
            $table->double('total_product_cost')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->sign;
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('moneytransactions');
    }
}
