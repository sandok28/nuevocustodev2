<?php

use Illuminate\Database\Seeder;

class IntervaloPuertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new \Carbon\Carbon();
        for ($i = 0; $i<10; $i++){
            DB::table('intervalo_puertas')->insert([
                'intervalo_id' => '1',
                'puerta_id' => $i+1,
            ]);
        }
    }
}
