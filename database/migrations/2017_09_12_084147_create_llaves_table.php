<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLlavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('llaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo');
            $table->string('llave_rfid');
            $table->integer('id_asociado');
            $table->dateTime('fecha_expiracion');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('llaves');
    }
}
