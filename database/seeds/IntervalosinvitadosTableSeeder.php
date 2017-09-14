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
            for ($j = 1; $j<10; $j++) {
                if ($i < 4) {
                    DB::table('IntervalosInvitados')->insert([
                        'targeta_rfid' => '4A2B2FD' . $i,
                        'desde' => $carbon->now()->addHour(2),
                        'hasta' => $carbon->now()->addHour(4),
                        'invitado_id' => $j,
                        'fecha' => $carbon->now()->subDays($i),
                    ]);

                } elseif ($i < 8) {
                    DB::table('IntervalosInvitados')->insert([
                        'targeta_rfid' => '4A2B2FD' . $i,
                        'desde' => $carbon->now()->subHour(4),
                        'hasta' => $carbon->now()->subHour(3),
                        'invitado_id' => $j,
                        'fecha' => $carbon->now(),
                    ]);
                } else {
                    DB::table('IntervalosInvitados')->insert([
                        'targeta_rfid' => '4A2B2FD' . $i,
                        'desde' => $carbon->now()->addHour(2),
                        'hasta' => $carbon->now()->addHour(4),
                        'invitado_id' => $j,
                        'fecha' => $carbon->now()->addDays($i-7),
                    ]);
                }
            }
        }
    }
}
