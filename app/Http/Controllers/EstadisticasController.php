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


        $puertas_usadas = DB::table('ingresos')
            ->select('puertas_id',DB::raw('count(1) as total'))
            ->where([
                ['fecha_hora', '>=', '01-12-2018'],
                ['fecha_hora', '<=', '01-12-2018']
            ])
            ->groupBy('puertas_id')
            ->get();
        $fecha_inicio = null;
        $fecha_fin    = null;
        return view('Estadisticas.Generar',[  'puertas_usadas'=>$puertas_usadas,
            'fecha_inicio'=>$fecha_inicio,
            'fecha_fin'=>$fecha_fin
        ]);


    }


    public  function graficas(Request $request)
    {



        //dd($request->fecha_inicio, $request->fecha_fin);



        DB::table('HorariosGenerales')->select('desde','hasta',DB::raw('count(*) as total'))->groupBy('desde','hasta')->get();

        $puertas_usadas = DB::table('ingresos')
            ->select('puertas_id',DB::raw('count(1) as total'))
            ->where([
                ['fecha_hora', '>=', $request->fecha_inicio],
                ['fecha_hora', '<=', $request->fecha_fin]
            ])
            ->groupBy('puertas_id')
            ->get();
        //dd($puertas_usadas);

        $fecha_inicio = $request->fecha_inicio;
        $fecha_fin = $request->fecha_fin;
        return view('Estadisticas.Generar',[  'puertas_usadas'=>$puertas_usadas,
                                                    'fecha_inicio'=>$fecha_inicio,
                                                    'fecha_fin'=>$fecha_fin
                                                 ]);


    }
}
