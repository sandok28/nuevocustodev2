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
        $desde = \Carbon\Carbon::createFromDate(2017,5,1);
        for ($i = 0; $i<10; $i++){
            $desde = \Carbon\Carbon::createFromDate(2017,5,$i);
            if ($i<5) {
                $hasta = \Carbon\Carbon::createFromDate(2017,5,31);
                DB::table('licencias')->insert([
                    'desde' => $desde,
                    'hasta' => $hasta,
                    'estatus' => 0,
                    'funcionario_id' => 1,

                ]);
            }
            else{
                $hasta = \Carbon\Carbon::createFromDate(2017,6,$i);
                DB::table('licencias')->insert([
                    'desde' => $desde,
                    'hasta' => $hasta,
                    'estatus' => 1,
                    'funcionario_id' => 1,

                ]);
            }

        }
    }
}
