<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErroresController extends Controller
{
    //ESTA CLASE SE ENCARGA DE TODAS LAS VISTAS CON ERRORES QUE NO PERTENECEN AUN MODULO EN PARTICULAR

    function error404(){
        //devuelve la vitsa error404 de los errores
        return view('errores.error404');
    }
}
