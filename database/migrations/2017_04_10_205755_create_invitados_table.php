<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Invitados', function (Blueprint $table) {
            $table->increments('id');
            $table->String('nombre');
            $table->String('apellido');
            $table->String('cedula');
            $table->String('celular');
            $table->String('correo');
            $table->String('fecha_nacimiento');
            $table->String('foto');
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
        Schema::dropIfExists('Invitados');
    }
}
