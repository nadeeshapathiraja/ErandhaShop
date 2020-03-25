<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupplyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplyers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('item_id')->nullable()->unsigned();
            $table->integer('quantity')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->sign;
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
        Schema::drop('supplyers');
    }
}
