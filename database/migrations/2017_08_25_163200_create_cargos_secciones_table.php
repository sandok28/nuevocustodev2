<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cargos_Secciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estatus_permiso');
            $table->timestamps();

            $table->integer('cargo_id')->unsigned();//llave foranea
            $table->foreign('cargo_id')->references('id')->on('Cargos');

            $table->integer('seccion_id')->unsigned();//llave foranea
            $table->foreign('seccion_id')->references('id')->on('Secciones');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cargos_Secciones');
    }
}
