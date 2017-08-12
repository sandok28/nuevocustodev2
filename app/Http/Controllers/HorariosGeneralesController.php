<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitado;
use Illuminate\Validation\Rules\In;
use Session;
use Redirect;

class HorariosGeneralesController extends Controller
{

    public function index()
    {
        $invitados=Invitado::all();
        return view('horarios_generales.index',compact('invitados'));
    }
}
