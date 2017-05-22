<?php

use Illuminate\Database\Seeder;

class UsuariosPuertaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<9; $i++){
            DB::table('puerta_user')->insert([
                'user_id' => 1,
                'puerta_id' => $i+1,
                'estatus_permiso' => 0,
            ]);
        }
    }
}
