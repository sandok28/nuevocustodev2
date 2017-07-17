<?php

use Illuminate\Database\Seeder;

class InvitadosTableSeeder extends Seeder
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
            DB::table('invitados')->insert([

                'nombre' => 'N-i-'.$i,
                'apellido' => 'A-i-'.$i,
                'cedula' => $i,
                'celular' => (1000+$i),
                'correo' => 'Correo-i-'.$i,
                'fecha_nacimiento' => $carbon->now(),
                'foto'=>'F-i-'.$i,
                'created_at' => $carbon->now(),
                'updated_at' => $carbon->now(),
            ]);
        }
    }
}
