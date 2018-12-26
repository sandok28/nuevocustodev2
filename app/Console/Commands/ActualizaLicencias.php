<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\LicenciasController;

class ActualizaLicencias extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'actualizar:licencias';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Actualiza el status de las licencias de los funcionarios ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {



        for ($i = 1; $i<7; $i++){
            DB::table('HorariosGenerales')->insert([
                'desde' => '05:00:00',
                'hasta' => '10:00:00',
                'dia' => $i,
            ]);
            DB::table('HorariosGenerales')->insert([
                'desde' => '15:00:00',
                'hasta' => '17:00:00',
                'dia' => $i,
            ]);

        }

        LicenciasController::actualizarEstatusLicencias();
    }
}
