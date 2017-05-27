<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
use App\Seccion;
use Session;
use Redirect;
class CargosController extends Controller
{


    //Recibe el id de la seccion al que va pertenecer el cargo
    public function create($seccion_id)
    {
        //devuelve la vista new de los cargos y le paso el id la seccion al que va pertenecer
        return view('cargos.new',['seccion_id'=>$seccion_id]);

    }
    //Recibe $request con los datos del formulario y el id de la seccion al que va pertenecer el cargo
    public function store(Request $request,$seccion_id)
    {
        Cargo::create([
            'nombre'=> $request['nombre'],
            'estatus'=> '1',
            'secciones_id' =>$seccion_id,
        ]);
        //Redirecciona a la vista edit de la seccion a la que pertenece el cargo
        return redirect('/secciones/'.$seccion_id.'/edit')->with('message','El cargo se ha registrado correctamente');
    }
    //Recibe el id del cargo
    public function edit($id)
    {
        $cargo = Cargo::find($id);
        //devuelve la vista edit de los cargos
        return view('cargos.edit',['cargo'=>$cargo]);
    }

    //Recibe $request con los datos del formulario y el id de la seccion al que pertenece el cargo
    public function update(Request $request, $id)
    {
        $cargo = Cargo::find($id);
        $cargo->fill($request->all());
        $cargo->save();
        Session::flash('message','Cargo Actualizado Correctamente');

        //Redirecciona a la vista edit de la seccion a la que pertenece el cargo
        return Redirect::to('/secciones/'.$cargo->secciones_id.'/edit');

    }
}
