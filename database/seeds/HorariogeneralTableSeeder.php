<?php

use Illuminate\Database\Seeder;

class HorariogeneralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carbon = new \Carbon\Carbon();
        for ($i = 1; $i<7; $i++){
            DB::table('HorariosGenerales')->insert([
                'desde' => '08:00:00',
                'hasta' => '12:00:00',
                'dia' => $i,
            ]);
            DB::table('HorariosGenerales')->insert([
                'desde' => '14:00:00',
                'hasta' => '18:00:00',
                'dia' => $i,
            ]);

        }
        for ($i = 1; $i<12; $i++){
            //Relaciono el usuario que se acabo de crear con todas las puertas existentes
            $todasPuertas = \App\Puerta::all();
            foreach($todasPuertas as $puerta){
                DB::table('Puertas_Users')->insert([
                    'user_id' => $i,
                    'puerta_id' => $puerta->id,
                    'estatus_permiso' => 1
                ]);
            }
            //Relaciono le usuario que se acabo de crear con todos los permisos existentes
            $todosPermisos = \App\Permiso::all();
            foreach($todosPermisos as $permiso){
                DB::table('Permisos_Users')->insert([
                    'usuario_id' => $i,
                    'permiso_id' => $permiso->id,
                    'estatus_permiso' => 1
                ]);
            }

        }



    }
}
