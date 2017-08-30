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
        for ($i = 1; $i<11; $i++){
            if ($i<4){
                DB::table('puertas')->insert([
                    'puerta_especial' => 1,
                    'nombre' => 'puerta '.$i,
                    'llave_rfid' => '4a61726120657320756e207075746f'.$i,
                    'ip' => '192.168.0.'.$i,
                    'estatus' => 1,
                    'estatus_en_horario_general'=> 0,
                ]);
            }
            else{
                DB::table('puertas')->insert([
                    'puerta_especial' => 0,
                    'nombre' => 'puerta '.$i,
                    'llave_rfid' => '4a61726120657320756e207075746f'.$i,
                    'ip' => '192.168.0.'.$i,
                    'estatus' => 1,
                    'estatus_en_horario_general'=> 1,
                ]);
            }

        }

    }
}

