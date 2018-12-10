<?php

namespace App\Http\Controllers;


use App\auditoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AuditoriasController extends Controller
{
    public  function index()
    {
        return view('auditorias.index');
    }

    public function Listar_Auditorias()
    {
        $auditarusuarios = auditoria::select('user_id','event','old_values','new_values','ip_address');
        return \Datatables::of($auditarusuarios)->make(true);
    }

}
