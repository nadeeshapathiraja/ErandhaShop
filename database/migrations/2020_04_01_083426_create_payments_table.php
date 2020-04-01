<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->integer('order_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->string('Paymenttypes')->nullable();
            $table->double('payment')->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->sign;
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
