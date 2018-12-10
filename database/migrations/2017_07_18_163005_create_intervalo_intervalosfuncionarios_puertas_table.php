<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervaloIntervalosfuncionariosPuertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IntervalosFuncionarios_Puertas', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('intervalo_funcionario_id')->unsigned();
            $table->foreign('intervalo_funcionario_id')->references('id')->on('IntervalosFuncionarios');

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
        Schema::dropIfExists('IntervalosFuncionarios_Puertas');
    }
}
