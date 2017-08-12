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

        for ($i = 0; $i<20; $i++){
            DB::table('IntervalosSecciones')->insert([
                'desde' => $carbon->now(),
                'hasta' => $carbon->now(),
                'dia' => 1,
                'seccion_id' => 1,
            ]);
        }
    }
}
