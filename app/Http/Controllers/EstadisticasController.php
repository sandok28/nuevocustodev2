<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Ingreso;
use App\Licencia;
use App\Puerta;
use App\Seccion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class EstadisticasController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarEstadisticasMiddleware');
    }
    /**
     * Metodo que devuelve la vista de generar estadisticas
    **/
    public function index()
    {
        $licencias = Licencia::all();
        $ingresos = Ingreso::all();
        $funcionarios= Funcionario::all();

        $fecha_limite='2018-02-07 00:00:00';
        $fecha_inicial='2018-02-04 00:00:00';
        /*
        $puertas = DB::table('ingresos')
            ->where([
                ['autorizado','=',1],
                ['fecha_hora','<=',$fecha_limite],
                ['fecha_hora','>=',$fecha_inicial]
            ])
            ->join('puertas', 'puertas.id', '=', 'ingresos.puertas_id')
            ->where('puertas.estatus',1)
            ->select('count(*) as total','puertas.nombre', 'ingresos.fecha_hora')
            ->groupBy('puertas.nombre')
            ->get();*/
        $puertas= DB::table("select count(*), `puertas`.`nombre`, `ingresos`.`fecha_hora` from `ingresos` inner join `puertas` on `puertas`.`id` = `ingresos`.`puertas_id` where (`autorizado` = 1 and `fecha_hora` <= '2018-02-07 00:00:00' and `fecha_hora` >= '2018-02-04 00:00:00') and `puertas`.`estatus` = 1 group by `puertas`.`nombre`");
        //dd($puertas);
        $secciones = Seccion::all();
        return view('Estadisticas.Generar',['funcionarios'=>$funcionarios,'licencias'=> $licencias,'ingresos'=>$ingresos,'puertas'=>$puertas,'secciones'=>$secciones]);
    }


    public  function fechas(Request $request)
    {

    }
}
