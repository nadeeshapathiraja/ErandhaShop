<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('photo')->nullable();
            $table->integer('category_id')->nullable()->unsigned();
            $table->string('product_code')->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('dolour_rate')->nullable();
            $table->double('product_cost')->nullable();
            $table->double('discount')->nullable();
            $table->double('tax')->nullable();
            $table->double('clearance_charge')->nullable();
            $table->double('slmarket_price')->nullable();
            $table->double('selling_price')->nullable();
            $table->foreign('category_id')->references('id')->on('categorys')->sign;
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
