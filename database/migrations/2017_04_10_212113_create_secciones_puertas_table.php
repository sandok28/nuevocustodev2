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
            $table->integer('estatus_permiso');
            $table->timestamps();

            $table->integer('seccion_id')->unsigned();
            $table->foreign('seccion_id')->references('id')->on('seccions');

            $table->integer('puerta_id')->unsigned();
            $table->foreign('puerta_id')->references('id')->on('Puertas');
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
