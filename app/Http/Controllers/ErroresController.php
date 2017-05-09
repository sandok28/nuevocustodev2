<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErroresController extends Controller
{
    function error404(){
        return view('errores.error404');
    }
}
