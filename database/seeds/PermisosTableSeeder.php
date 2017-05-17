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
            'nombre' => 'Editar Roles ',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestion Puertas',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar Horario Funcionarios ',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar Invitados ',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar Lisencias',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Generar Reportes ',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Generar  Estadisticas ',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Gestionar Secciones y Cargos',
            'estatus' => 1,
        ]);
        DB::table('permisos')->insert([
            'nombre' => 'Acceso a Auditorias',
            'estatus' => 1,
        ]);
    }
}
