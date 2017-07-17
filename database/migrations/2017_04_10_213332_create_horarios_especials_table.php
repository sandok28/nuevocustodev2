<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosEspecialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_especials', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('hora_desde');
            $table->dateTime('hora_hasta');
            $table->timestamps();



            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');

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
        Schema::dropIfExists('horarios_especials');
    }
}
