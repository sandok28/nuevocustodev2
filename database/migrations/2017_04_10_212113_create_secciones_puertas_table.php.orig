<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeccionesPuertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secciones_puertas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estatus');
            $table->timestamps();

            $table->integer('seccions_id')->unsigned();
            $table->foreign('seccions_id')->references('id')->on('seccions');

            $table->integer('puertas_id')->unsigned();
            $table->foreign('puertas_id')->references('id')->on('Puertas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secciones_puertas');
    }
}
