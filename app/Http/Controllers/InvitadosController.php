<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invitado;
use Illuminate\Validation\Rules\In;
use Session;
use Redirect;

class InvitadosController extends Controller
{

    /**
     * No hace nada en concreto solo llama a la vista index donde se listan todos los invitados
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de cargos
     * y le paso
     * $invitados coleccion con todos los invitados
     */
    public function index()
    {
        $invitados=Invitado::all();
        return view('invitados.index',compact('invitados'));
    }

    /**
     * No hace nada en concreto solo llama a la vista create de invitados
     *
     * @return \Illuminate\Http\Response devuelve la vista create de invitados
     */
    public function create()
    {
        return view('invitados.create');
    }
    /**
     * Crea un nuevo invitados con los datos que recibe del formulario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista edit del invitado que se acaba de crear
     * @param Request $request con los datos del formulario
     */

    public function store(Request $request)
    {
        Invitado::create([
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'cedula'=>$request->cedula,
            'celular'=>$request->celular,
            'correo'=>$request->correo,
            'fecha_nacimiento'=>$request->fecha_nacimiento,
            'foto'=>"NO HAY",
        ]);
        //obtengo el ultimo invitado que se creo es decir la que acabamos de crear
        $invitado = Invitado::orderBy('created_at', 'desc')->first();

        return redirect('/invitados/'.$invitado->id.'/edit')->with('message','El Invitado se ha registrado correctamente');
    }

    /**
     * No hace nada en concreto solo llama a la vista edit de invitados
     * la cual tiene el formulario de invitados
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de invitados
     * y le paso
     * $invitado  objeto del invitado asociado al $id que llega por parametro.
     * @param integer $id id del invitado a editar
     */
    public function edit($id)
    {
        $invitado = Invitado::find($id);
        //Devuelvo la vista edit de usuarios y le paso la $usuario.
        return view('invitados.edit',['invitado'=>$invitado]);
    }

    /**
     * Actualiza el invitado asociado al $id con los datos que trae el $request
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciono a la vita index de invitados.
     * @param Request $request con los datos del formulario
     * @param integer $id id del invitado que se quiere actualizar
     */
    public function update(Request $request, $id)
    {
        $invitado = Invitado::find($id);
        $invitado->fill($request->all());
        $invitado->save();
        Session::flash('message','Invitado Actualizado Correctamente');

        return Redirect::to('/invitados');
    }


}
