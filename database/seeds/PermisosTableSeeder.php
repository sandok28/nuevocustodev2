<?php

use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar usuarios',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar funcionarios',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar licencias',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar cargos',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar secciones',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar horario general',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar invitados',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar puertas',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar estadisticas',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar auditoria',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Apertura De Puertas',
            'estatus' => 1,
        ]);

    }
}
