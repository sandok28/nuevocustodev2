<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
use App\Seccion;
use Session;
use Redirect;
class CargosController extends Controller
{

    public function create()
    {
        return view('cargos.create');
    }

    public function newcargo($seccion_id)
    {

        return view('cargos.new',['seccion_id'=>$seccion_id]);
    }

    public function store(Request $request,$seccion_id)
    {
        Cargo::create([
            'nombre'=> $request['nombre'],
            'estatus'=> '1',
            'secciones_id' =>$seccion_id,
        ]);
        return redirect('/secciones/'.$seccion_id.'/edit')->with('message','El cargo se ha registrado correctamente');
    }

    public function edit($id)
    {
        $cargo = Cargo::find($id);
        return view('cargos.edit',['cargo'=>$cargo]);
    }


    public function update(Request $request, $id)
    {
        $cargo = Cargo::find($id);
        $cargo->fill($request->all());
        $cargo->save();
        Session::flash('message','Cargo Actualizado Correctamente');
        return Redirect::to('/secciones/'.$cargo->secciones_id.'/edit');

    }
}
