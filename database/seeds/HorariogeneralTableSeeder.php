<?php

use Illuminate\Database\Seeder;

class HorariogeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new \Carbon\Carbon();
        for ($i = 1; $i<7; $i++){
            DB::table('HorariosGenerales')->insert([
                'desde' => '08:00:00',
                'hasta' => '12:00:00',
                'dia' => $i,
            ]);
            DB::table('HorariosGenerales')->insert([
                'desde' => '14:00:00',
                'hasta' => '18:00:00',
                'dia' => $i,
            ]);

        }
    }
}
