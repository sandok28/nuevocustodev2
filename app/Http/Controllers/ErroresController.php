<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErroresController extends Controller
{
    //ESTA CLASE SE ENCARGA DE TODAS LAS VISTAS CON ERRORES QUE NO PERTENECEN AUN MODULO EN PARTICULAR


    /**
     * No hace nada en concreto solo llama a la vista error404
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista error404 de errores
     */
    function error404(){
        //devuelve la vitsa error404 de los errores
        return view('errores.error404');
    }
}
