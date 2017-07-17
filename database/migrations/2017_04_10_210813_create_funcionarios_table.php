<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedula');
            $table->String('nombre');
            $table->String('foto');
            $table->dateTime('fecha_nacimiento');
            $table->String('apelido');
            $table->integer('celular');
            $table->String('correo');
            $table->boolean('hoario_normal');
            $table->boolean('dado_de_baja');
            $table->boolean('licencia');
            $table->String('tarjeta_rfid');
            $table->integer('estatus');
            $table->timestamps();

            $table->integer('cargos_id')->unsigned();
            $table->foreign('cargos_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
