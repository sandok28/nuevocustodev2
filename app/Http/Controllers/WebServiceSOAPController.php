<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SoapClient;

class WebServiceSOAPController extends Controller
{
    public function servicio()
    {


        return "hola servico";
    }

    public function cliente()
    {

        return "hola cliente" ;
    }
}
