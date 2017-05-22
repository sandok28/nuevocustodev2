<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisosUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permisos_usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estatus_permiso');
            $table->timestamps();

            $table->integer('permiso_id')->unsigned();
            $table->foreign('permiso_id')->references('id')->on('permisos');

            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permisos_usuarios');
    }
}

/*
C:\laragon\www\CUSTODE>php artisan make:model Seccion -m
Model created successfully.
Created Migration: 2017_04_10_201647_create_seccions_table

C:\laragon\www\CUSTODE>php artisan migrate

C:\laragon\www\CUSTODE>php artisan make:migration puerta
Created Migration: 2017_04_10_205100_puerta

C:\laragon\www\CUSTODE>php artisan make:model puerta -m
Model created successfully.
Created Migration: 2017_04_10_205147_create_puertas_table

C:\laragon\www\CUSTODE>php artisan make:model invitado -m
Model created successfully.
Created Migration: 2017_04_10_205755_create_invitados_table

C:\laragon\www\CUSTODE>php artisan make:model usuario -m
Model created successfully.
Created Migration: 2017_04_10_210055_create_usuarios_table

C:\laragon\www\CUSTODE>php artisan make:model cargo  -m
Model created successfully.
Created Migration: 2017_04_10_210304_create_cargos_table

C:\laragon\www\CUSTODE>php artisan make:model funcionario -m
Model created successfully.
Created Migration: 2017_04_10_210813_create_funcionarios_table

C:\laragon\www\CUSTODE>php artisan make:model licencia -m
Model created successfully.
Created Migration: 2017_04_10_211644_create_licencias_table

C:\laragon\www\CUSTODE>php artisan make:model secciones_puerta -m
Model created successfully.
Created Migration: 2017_04_10_212113_create_secciones_puertas_table

C:\laragon\www\CUSTODE>php artisan make:model ingreso -m
Model created successfully.
Created Migration: 2017_04_10_212549_create_ingresos_table

C:\laragon\www\CUSTODE>php artisan make:model horas_especial -m
Model created successfully.
Created Migration: 2017_04_10_213053_create_horas_especials_table

C:\laragon\www\CUSTODE>php artisan make:model horarios_especial -m
Model created successfully.
Created Migration: 2017_04_10_213332_create_horarios_especials_table

C:\laragon\www\CUSTODE>php artisan make:model horarios_invitado -m
Model created successfully.
Created Migration: 2017_04_10_213524_create_horarios_invitados_table

C:\laragon\www\CUSTODE>php artisan make:model permiso -m
Model created successfully.
Created Migration: 2017_04_10_213838_create_permisos_table

C:\laragon\www\CUSTODE>php artisan make:model permisos_usuario -m
Model created successfully.
Created Migration: 2017_04_10_213924_create_permisos_usuarios_table

*/
