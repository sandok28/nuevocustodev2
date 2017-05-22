<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosPuertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puerta_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estatus_permiso');
            $table->timestamps();
            $table->integer('puerta_id')->unsigned();
            $table->foreign('puerta_id')->references('id')->on('puertas');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puerta_user');
    }
}
