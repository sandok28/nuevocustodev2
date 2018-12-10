<?php

use Illuminate\Database\Seeder;

class LicenciasTableSeeder extends Seeder
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
            if ($i < 4) {
                DB::table('licencias')->insert([
                    'desde' => $carbon->now()->subDays($i+$i),
                    'hasta' => $carbon->now()->subDays($i),
                    'estatus' => 1,
                    'funcionario_id' => $i,
                ]);

            } elseif ($i < 8) {
                DB::table('licencias')->insert([
                    'desde' => $carbon->now()->subDays($i-4),
                    'hasta' => $carbon->now()->addDays($i+4),
                    'estatus' => 1,
                    'funcionario_id' => $i,
                ]);
            } else {
                DB::table('licencias')->insert([
                    'desde' => $carbon->now()->addDays($i+4),
                    'hasta' => $carbon->now()->addDays($i+$i),
                    'estatus' => 1,
                    'funcionario_id' => $i,
                ]);
            }
        }

    }
}
