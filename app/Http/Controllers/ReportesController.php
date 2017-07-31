<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportesController extends Controller
{
    /**
     * Genera la vista de Reporte
    *
    * @return vista Reportes.GenerarReporte
    **/
    public function index()
    {
        return view('Reportes.GenerarReporte');
    }
}
