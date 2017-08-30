<?php

use Illuminate\Database\Seeder;

class PuertasUsersTableSeeder extends Seeder
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
                DB::table('Puertas_Users')->insert([
                    'user_id' => $i,
                    'puerta_id' => $j,
                    'estatus_permiso' => 0,
                ]);
            }
        }

    }
}
