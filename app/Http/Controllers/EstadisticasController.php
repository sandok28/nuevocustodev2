<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstadisticasController extends Controller
{
    /**
     * Metodo que devuelve la vista de generar estadisticas
    **/
    public function index()
    {
        return view('Estadisticas.Generar');
    }
}
