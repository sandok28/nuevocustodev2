<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportesController extends Controller
{
    public function index()
    {
       // return 'Hola soy la vista de Reportes';
        return view('Reportes.GenerarReporte');
    }
}
