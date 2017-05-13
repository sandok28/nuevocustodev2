<?php

use Illuminate\Database\Seeder;

class CargosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<10; $i++){
            DB::table('cargos')->insert([
                'nombre' => 'cargo'.$i,
                'estatus' => 1,
                'secciones_id'=>1,
            ]);
        }
    }
}
