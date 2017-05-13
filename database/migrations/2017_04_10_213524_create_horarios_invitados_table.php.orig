<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_invitados', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('desde');
            $table->dateTime('hasta');
            $table->timestamps();
            $table->integer('invitados_id')->unsigned();
            $table->foreign('invitados_id')->references('id')->on('invitados');
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
        Schema::dropIfExists('horarios_invitados');
    }
}
