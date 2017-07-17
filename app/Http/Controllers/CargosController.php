<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
use App\Seccion;
use Session;
use Redirect;
class CargosController extends Controller
{


    /**
     * No hace nada en concreto solo llama a la vista create
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de cargos y le paso el id la seccion al que va pertenecer
     * @param integer $seccion_id id de la seccion al que va pertenecer el cargo
     */
    public function create($seccion_id)
    {
        return view('cargos.create',['seccion_id'=>$seccion_id]);
    }

    /**
     * Crea un nuevo cargo con los datos que recibe del formulario
     * por defecto asigna el estatus del nuevo cargo en 1 indicando que esta activo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista edit de la seccion a la que pertenece el cargo
     * @param Request $request con los datos del formulario
     * @param integer $seccion_id  id de la seccion al que va pertenecer el cargo
     */
    public function store(Request $request,$seccion_id)
    {
        Cargo::create([
            'nombre'=> $request['nombre'],
            'estatus'=> '1',
            'secciones_id' =>$seccion_id,
        ]);

        return redirect('/secciones/'.$seccion_id.'/edit')->with('message','El cargo se ha registrado correctamente');
    }

    /**
     * Busca el cargo asociado al $id y lo guarda en la variable $cargo
     * luego llama a la vista edit
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de cargos y le paso la variable $cargo
     * @param integer $id  id del cargo que se quiere editar
     */
    public function edit($id)
    {
        $cargo = Cargo::find($id);

        return view('cargos.edit',['cargo'=>$cargo]);
    }

    /**
     * Busca el cargo asociado al $id y actualiza los datos de este
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista edit de la seccion a la que pertenece el cargo
     * @param Request $request con los datos del formulario
     * @param integer $id id del cargo que se quiere actualizar
     */
    public function update(Request $request, $id)
    {
        $cargo = Cargo::find($id);
        $cargo->fill($request->all());
        $cargo->save();
        Session::flash('message','Cargo Actualizado Correctamente');

        return Redirect::to('/secciones/'.$cargo->secciones_id.'/edit');

    }
}
