<?php

use Illuminate\Database\Seeder;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i<11; $i++) {
            DB::table('Secciones')->insert([
                'nombre' => 'Seccion ' . $i,
                'estatus' => 1,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ]);
        }
        for ($i = 1; $i<11; $i++) {

            //Relaciono la seccion que se acabo de crear con todas las puertas existentes
            $puertas = DB::table('Puertas')
                ->select('id')
                ->get();
            $j = 1;
            foreach($puertas as $puerta){
                DB::table('Puertas_Secciones')->insert([
                    'seccion_id' => $i,
                    'puerta_id' => $puerta->id,
                    'estatus_permiso' => 0
                ]);
                DB::table('Cargos_Secciones')
                    ->insert([
                        'cargo_id'=> $i,
                        'seccion_id'=> $j,
                        'estatus_permiso'=>'0'
                    ]);
                $j++;
            }

        }

    }
}


