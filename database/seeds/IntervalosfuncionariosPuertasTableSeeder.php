<?php

use Illuminate\Database\Seeder;

class IntervalosfuncionariosPuertasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 0; $i<10; $i++){
            DB::table('IntervalosFuncionarios_Puertas')->insert([
                'intervalo_funcionario_id'=> '1',
                'puerta_id' => $i+1,

            ]);
        }
    }
}
