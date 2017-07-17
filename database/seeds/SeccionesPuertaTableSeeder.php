<?php

use Illuminate\Database\Seeder;

class SeccionesPuertaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<9; $i++){
            DB::table('secciones_puertas')->insert([
                'seccion_id' => 1,
                'puerta_id' => $i+1,
                'estatus_permiso' => 0,
            ]);
        }
    }
}
