<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SeccionsTableSeeder::class);
        $this->call(CargosTableSeeder::class);
        $this->call(PuertasTableSeeder::class);
        $this->call(SeccionesPuertaTableSeeder::class);
        $this->call(UsuariosPuertaTableSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(PermisosUserTableSeeder::class);
        $this->call(FuncionariosTableSeeder::class);
        $this->call(InvitadosTableSeeder::class);
        $this->call(IntervalosTableSeeder::class);
        $this->call(IntervaloPuertasTableSeeder::class);
        $this->call(LicenciasTableSeeder::class);


    }
}
