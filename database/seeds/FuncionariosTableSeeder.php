<?php

use Illuminate\Database\Seeder;

class FuncionariosTableSeeder extends Seeder
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
            DB::table('funcionarios')->insert([
                'cedula' => $i,
                'nombre' => 'N'.$i,
                'foto'=>'F'.$i,
                'fecha_nacimiento' => '2017-05-22 16:15:10',
                'apelido' => 'A'.$i,
                'celular' => $i,
                'correo' => 'C'.$i,
                'hoario_normal' => 1,
                'dado_de_baja' => 0,
                'licencia' => 0,
                'tarjeta_rfid' => '0'.$i,
                'estatus' => 1,
                'cargos_id'=>1,
            ]);
        }
    }
}
