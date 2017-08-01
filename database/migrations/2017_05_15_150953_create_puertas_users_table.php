<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuertasUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Puertas_Users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estatus_permiso');
            $table->timestamps();
            $table->integer('puerta_id')->unsigned();
            $table->foreign('puerta_id')->references('id')->on('Puertas');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('Users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Puertas_Users');
    }
}
