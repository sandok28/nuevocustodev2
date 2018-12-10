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
        for ($i = 1; $i<11; $i++){
            DB::table('invitados')->insert([

                'nombre' => 'Invitado '.$i,
                'apellido' => 'Apellido '.$i,
                'cedula' => '112182557'.$i,
                'celular' => '310446839'.$i,
                'correo' => 'Invitado'.$i.'@gmail.com',
                'fecha_nacimiento' => $carbon->now()->toDateString(),
                'foto'=>'F-i-'.$i,
                'created_at' => $carbon->now(),
                'updated_at' => $carbon->now(),
            ]);
        }
    }
}
