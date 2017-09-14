<?php

use Illuminate\Database\Seeder;

class IntervalosseccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new \Carbon\Carbon();

        for ($i = 1; $i<11; $i++){
            for ($j = 1; $j<7; $j++){
                DB::table('IntervalosSecciones')->insert([
                    'desde' => '08:00:00',
                    'hasta' => '12:00:00',
                    'dia' => $j,
                    'seccion_id' => $i,
                ]);
            }
        }
    }
}
