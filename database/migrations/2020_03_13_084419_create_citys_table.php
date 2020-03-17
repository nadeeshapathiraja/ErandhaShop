<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citys', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->integer('deliverycompany_id')->nullable();
            $table->integer('zone_id')->nullable()->unsigned();
            $table->integer('postal_code')->nullable();
            $table->double('price')->nullable();
            $table->foreign('zone_id')->references('id')->on('zones')->sign;
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('citys');
    }
}
