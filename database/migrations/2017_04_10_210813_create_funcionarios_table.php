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
        Schema::create('Funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula');
            $table->String('nombre');
            $table->String('foto',1000);
            $table->date('fecha_nacimiento');
            $table->String('apellido');
            $table->String('celular');
            $table->String('correo');
            $table->boolean('horario_normal');
            $table->boolean('estatus_licencia');
            $table->boolean('licencia');
            $table->String('tarjeta_rfid');
            $table->integer('estatus');
            $table->timestamps();

            $table->integer('cargo_id')->unsigned();
            $table->foreign('cargo_id')->references('id')->on('Cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Funcionarios');
    }
}
