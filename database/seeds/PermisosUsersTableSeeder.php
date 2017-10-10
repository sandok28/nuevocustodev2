<?php

use Illuminate\Database\Seeder;

class PermisosUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i<12; $i++){
            DB::table('Permisos_Users')->insert([
                'permiso_id' => $i,
                'usuario_id' => 1,
                'estatus_permiso' => 1,
            ]);
        }
    }
}
