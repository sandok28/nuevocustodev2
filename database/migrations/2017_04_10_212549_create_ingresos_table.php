<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('fecha_hora');
            $table->boolean('autorizado');
            $table->timestamps();


            $table->integer('funcionario_id')->unsigned()->nullable($value=true);
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');

            $table->integer('puertas_id')->unsigned();
            $table->foreign('puertas_id')->references('id')->on('Puertas');

            $table->integer('invitados_id')->unsigned()->nullable($value=true);
            $table->foreign('invitados_id')->references('id')->on('invitados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
