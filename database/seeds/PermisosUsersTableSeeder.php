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
        for ($i = 0; $i<9; $i++){
            DB::table('Permisos_Users')->insert([
                'permiso_id' => $i+1,
                'usuario_id' => 1,
                'estatus_permiso' => 0,
            ]);
        }
    }
}
