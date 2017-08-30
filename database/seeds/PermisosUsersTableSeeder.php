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
        for ($i = 1; $i<11; $i++){
            for ($j = 1; $j<11; $j++) {
                DB::table('Permisos_Users')->insert([
                    'permiso_id' => $i,
                    'usuario_id' => $j,
                    'estatus_permiso' => 0,
                ]);
            }
        }
    }
}
