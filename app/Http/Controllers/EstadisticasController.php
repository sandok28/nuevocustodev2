<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstadisticasController extends Controller
{
    /**
     * Metodo que devuelve la vista de generar estadisticas
    **/
    public function index()
    {
        $nombres= Funcionario::all();
        $horarios=Funcionario::all();
        //dd($nombres,$horarios);
        return view('Estadisticas.Generar',['nombres'=>$nombres,'horarios'=>$horarios]);
    }
}
