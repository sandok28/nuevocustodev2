<?php

use Illuminate\Database\Seeder;

class SeccionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i<10; $i++){
            DB::table('seccions')->insert([
                'nombre' => 's'.$i,
                'estatus' => 1,
            ]);
        }

    }
}


