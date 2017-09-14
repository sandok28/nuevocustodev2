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
        for ($i = 1; $i<11; $i++){
            DB::table('Cargos')->insert([
                'nombre' => 'Cargo '.$i,
                'estatus' => 1,
            ]);
        }
    }
}
