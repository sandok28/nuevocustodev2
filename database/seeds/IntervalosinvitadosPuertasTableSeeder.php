<?php

use Illuminate\Database\Seeder;

class IntervalosinvitadosPuertasTableSeeder extends Seeder
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
            DB::table('IntervalosInvitados_Puertas')->insert([
                'intervalo_invitado_id' => '1',
                'puerta_id' => $i+1,
            ]);
        }
    }
}
