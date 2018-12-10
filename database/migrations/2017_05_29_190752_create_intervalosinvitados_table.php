<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervalosinvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IntervalosInvitados', function (Blueprint $table) {
            $table->increments('id');
            $table->String('targeta_rfid');
            $table->time('desde');
            $table->time('hasta');
            $table->date('fecha');

            $table->integer('invitado_id')->unsigned();//llave foranea
            $table->foreign('invitado_id')->references('id')->on('Invitados');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('IntervalosInvitados');
    }
}
