<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervalosinvitadosPuertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IntervalosInvitados_Puertas', function (Blueprint $table) {

            $table->integer('intervalo_invitado_id')->unsigned();
            $table->foreign('intervalo_invitado_id')->references('id')->on('IntervalosInvitados');

            $table->integer('puerta_id')->unsigned();
            $table->foreign('puerta_id')->references('id')->on('Puertas');

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
        Schema::dropIfExists('IntervalosInvitados_Puertas');
    }
}
