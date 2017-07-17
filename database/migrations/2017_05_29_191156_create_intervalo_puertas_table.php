<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervaloPuertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intervalo_puertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intervalo_id')->unsigned();
            $table->foreign('intervalo_id')->references('id')->on('intervalos');
            $table->integer('puerta_id')->unsigned();
            $table->foreign('puerta_id')->references('id')->on('puertas');

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
        Schema::dropIfExists('intervalo_puertas');
    }
}
