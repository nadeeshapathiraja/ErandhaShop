<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->string('month')->nullable();
            $table->integer('deliverycompany_id')->nullable()->unsigned();
            $table->string('shipment_code')->nullable();
            $table->string('name')->nullable();
            $table->string('order_source')->nullable();
            $table->integer('item_id')->nullable()->unsigned();
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->string('Location_address')->nullable();
            $table->integer('zone_id')->nullable()->unsigned();
            $table->string('telephone')->nullable();
            $table->string('notes')->nullable();
            $table->string('first_payment')->nullable();
            $table->string('deposit_type')->nullable();
            $table->string('delivery_process')->nullable();
            $table->foreign('item_id')->references('id')->on('items')->sign;
            $table->foreign('zone_id')->references('id')->on('zones')->sign;
            $table->foreign('deliverycompany_id')->references('id')->on('deliverycompanys')->sign;
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
        Schema::drop('orders');
    }
}
