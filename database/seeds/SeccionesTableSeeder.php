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
        for ($i = 0; $i<10; $i++){
            DB::table('Secciones')->insert([
                'nombre' => 's'.$i,
                'estatus' => 1,
            ]);
        }

    }
}


