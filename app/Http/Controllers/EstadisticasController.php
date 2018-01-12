<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Ingreso;
use App\Licencia;
use App\Puerta;
use App\Seccion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $puertas =  Puerta::all();
        $secciones = Seccion::all();
        return view('Estadisticas.Generar',['funcionarios'=>$funcionarios,'licencias'=> $licencias,'ingresos'=>$ingresos,'puertas'=>$puertas,'secciones'=>$secciones]);
    }
}
