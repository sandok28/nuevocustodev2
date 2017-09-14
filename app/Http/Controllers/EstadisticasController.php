<?php

namespace App\Http\Controllers;

use App\Funcionario;
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
        $funcionarios= Funcionario::all();
        return view('Estadisticas.Generar',['funcionarios'=>$funcionarios]);
    }
}
