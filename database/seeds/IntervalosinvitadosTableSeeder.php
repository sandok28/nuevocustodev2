<?php

use Illuminate\Database\Seeder;

class IntervalosinvitadosTableSeeder extends Seeder
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
            DB::table('IntervalosInvitados')->insert([
                'targeta_rfid' => $i*123,
                'desde' => $carbon->now(),
                'hasta'=> $carbon->now(),
                'invitado_id' => '1',
                'fecha' => $carbon->now(),
            ]);
        }
    }
}
