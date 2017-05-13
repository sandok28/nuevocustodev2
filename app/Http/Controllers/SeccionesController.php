<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Cargo;
use Session;
use Redirect;
class SeccionesController extends Controller
{

    public function index()
    {


        $cargos = Seccion::find(1)->cargos;
        $secciones = Seccion::all();

        return view('secciones.index',compact('secciones'));

    }
    public function create()
    {
        $cargos = Cargo::all();
        return view('secciones.create',compact('cargos'));
    }



    public function store(Request $request)
    {
        Seccion::create([
            'nombre'=> $request['nombre'],
            'estatus'=> '1',
        ]);
        $seccion = Seccion::orderBy('created_at', 'desc')->first();
        return redirect('/secciones/'.$seccion->id.'/edit')->with('message','La seccion se ha registrado correctamente');

    }


    public function edit($id)
    {
        $seccion = Seccion::find($id);
        $cargos = Cargo::all();
        return view('secciones.edit',['seccion'=>$seccion,'cargos'=>$cargos]);
    }


    public function update(Request $request, $id)
    {
        $seccion = Seccion::find($id);
        $seccion->fill($request->all());
        $seccion->save();
        Session::flash('message','Seccion Actualizada Correctamente');
        return Redirect::to('/secciones');
    }
}
