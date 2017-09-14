<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->insert([
                'name' => 's'.$i,
                'email' => 's'.$i,
                'password' => bcrypt('s'.$i),
                'estatus' => 1,
                'created_at' => $carbon->now(),
                'updated_at' => $carbon->now(),
            ]);
        }

    }
}
