<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuertasActualizarRequest;
use App\Http\Requests\PuertasCrearRequest;
use App\Puerta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Redirect;

class PuertasController extends Controller
{
    /**
     * Llama la vista index de GestionAreas y genera la variable puertas
     * que contiene los datos que son tomados del modelo Puertas
     * y se pasa por meido de la funcion compact a la vista.
     * @var $puerta PuertaModel  almacena un objeto que contiene informacion de la base de datos
     **/
    public function index()
    {
        $puertas=Puerta::all();
        dd($puertas);
        return view('GestionAreas.index',compact('puertas'));
    }

    /**
     * Muestra el recurso de create que es una vista dentro de la
     * carpeta GestionAreas.create que es un create.blade
     * que a su ves carga una vista de formularios.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('GestionAreas.create');
    }

    /**
     * Almacena un nuevo item en la base de datos por medio de
     * la Funcion create con el modelo Puerta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response devuelve la vista segun la accion que ocurra con un mensaje
     */
    public function store(PuertasCrearRequest $request)
    {

        //Nota cosas que se deben hacer al crear una nueva puerta
        //Vincular la nueva puerta como inactiva, con todas las secciones existentes en la tabla   Puertas_Secciones
        //Vincular la nueva puerta como inactiva, con todas los usuarios existentes en la tabla   Puertas_Users
        //estatus_en_horario_general creela siempre en 0
    try {
        Puerta::create([
            'puerta_especial' => $request['puerta_especial'],
            'nombre' => $request['nombre'],
            'llave_rfid' => $request['llave_rfid'],
            'estatus' => '1',
            'estatus_en_horario_general' => '0',
            'ip' => $request['ip'],
        ]);

        return redirect('/GestionAreas')->with(['message' => 'La Puerta  se ha creado correctamente', 'tipo' => 'message']);
    }catch (\Exception $ex){
    return redirect('/GestionAreas')->with(['message' => 'La Puerta  ha tenido un error al crear', 'tipo' => 'message']);
    }
    }

    /**
     * Display the specified resource.
     * No se usa para el proyecto.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Muestra la puerta a editar llamada por medio de la funcion find
     * del modelo de Puerta.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puerta = Puerta::find($id);
        return view('GestionAreas.edit',['puerta'=>$puerta]);
    }

    /**
     * Actualiza un registro de la base de datos correspodiende al id
     * que le llega por parametro y los datos que llegan por parametro
     * en la variable $request
     * devolviendo un mensaje de Puerta actualizada correctamente.
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PuertasActualizarRequest $request, $id)
    {
        //
            $variablesAdaptadas = [
                'nombre'=> $request->all()['nombre'],
                'llave_rfid'=>$request->all()['llave_rfid'],
                'ip'=>$request->all()['ip'],
                'puerta_especial' => $request->all()['puerta_especial'],

            ];
            $puerta = Puerta::find($id);
            $puerta->fill($variablesAdaptadas);
            $puerta->save();
            //dd('has llegado hasta antes del redirecto');
            return redirect('/GestionAreas')->with(['message'=>'La Puerta  se ha actualizado correctamente','tipo'=>'message']);


    }

    /**
     * Remove the specified resource from storage.
     * No se usa para la aplicacion.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
