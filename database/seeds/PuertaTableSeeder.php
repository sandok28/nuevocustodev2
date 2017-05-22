<?php

use Illuminate\Database\Seeder;

class PuertaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 0; $i<10; $i++){
            DB::table('puertas')->insert([
                'puerta_especial' => 0,
                'nombre' => 's'.$i,
                'llave_rfid' => $i,
                'ip' => $i,
                'estatus' =>1,
            ]);
        }
    }
}
