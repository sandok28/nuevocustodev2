<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre');
            $table->integer('estatus');
            $table->timestamps();

            $table->integer('secciones_id')->unsigned();//llave foranea
            $table->foreign('secciones_id')->references('id')->on('Secciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cargos');
    }
}
