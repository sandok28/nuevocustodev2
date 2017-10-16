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


            DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin',
                'password' => bcrypt('admin'),
                'estatus' => 1,
                'created_at' => $carbon->now(),
                'updated_at' => $carbon->now(),
            ]);


    }
}
