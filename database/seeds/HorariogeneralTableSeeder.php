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
        for ($i = 1; $i<8; $i++){
            DB::table('HorariosGenerales')->insert([
                'desde' => $carbon->now(),
                'hasta'=> $carbon->now(),
                'dia'=> $i,
            ]);
        }
    }
}
