<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Puertas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('puerta_especial');
            $table->string('nombre');
            $table->string('llave_rfid');
            $table->string('ip');
            $table->integer('estatus');
            $table->integer('estatus_en_horario_general');
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
        Schema::dropIfExists('Puertas');
    }
}
