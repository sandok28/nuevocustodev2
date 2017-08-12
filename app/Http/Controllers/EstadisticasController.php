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
        $nombre= Funcionario::pluck('nombre');
        $horario=Funcionario::pluck('hoario_normal');
        //dd($nombre,$horario);
        return view('Estadisticas.Generar', compact('nombre','hoario_normal'));
    }
}
