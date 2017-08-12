<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervalosseccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IntervalosSecciones', function (Blueprint $table) {
            $table->time('desde');
            $table->time('hasta');
            $table->integer('dia');

            $table->integer('seccion_id')->unsigned();
            $table->foreign('seccion_id')->references('id')->on('Secciones');

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
        Schema::dropIfExists('IntervalosSecciones');
    }
}
