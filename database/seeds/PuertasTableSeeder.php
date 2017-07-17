<?php

use Illuminate\Database\Seeder;

class PuertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<10; $i++){
            if ($i<5){
                DB::table('puertas')->insert([
                    'puerta_especial' => 1,
                    'nombre' => 'puerta '.$i,
                    'llave_rfid' => 123456,
                    'ip' => '192.168.0.'.$i,
                    'estatus' => 1,
                ]);
            }
            else{
                DB::table('puertas')->insert([
                    'puerta_especial' => 0,
                    'nombre' => 'puerta '.$i,
                    'llave_rfid' => 123456,
                    'ip' => '192.168.0.'.$i,
                    'estatus' => 1,
                ]);
            }

        }

    }
}

