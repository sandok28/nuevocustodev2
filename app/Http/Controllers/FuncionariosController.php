<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class FuncionariosController extends Controller
{
    /**
     *Llama la vista index de funcionarios y se pasa
     * por parametro los datos en la variable funcionarios
     * por medio de la funcion compact a la vista.
     */
    public function index()
    {
        $funcionarios=Funcionario::all();
        return view('funcionarios.index',compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cargos = Cargo::all();
        return view('funcionarios.create',compact('cargos'));
    }

    /**
     * Recibe los parametros de la vista create del formulario en funcionarios
     * por medio de request y los almacena en la base de datos por medio del modelo
     * Funcionario con la funciona create.
     */
    public function store(Request $request)
    {

            Funcionario::create([
                'nombre'=>$request['nombre'],
                'apelido'=>$request['apellido'],
                'cedula'=>$request['cedula'],
                'correo'=>$request['correo'],
                'tarjeta_rfid'=>$request['tarjeta_rfid'],
                'cargos_id'=>'1',
                'foto'=>'0',
                'celular'=>$request['celular'],
                'hoario_normal'=>$request['asignar_horario_nomal'],
                'licencia'=>'1',
                'estatus'=>'0',
                'dado_de_baja'=>'0',
            ]);

        return redirect('/funcionarios')->with('message','El Usuario se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Edita un funcionario especifico que envia desde el index de funcionario.
     *
     * Genera dos variables cargos y funcionarios para enviar a la vista editar
     * y tener todos los datos correspondientes al id a editar.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargos = Cargo::all();
        $funcionario = Funcionario::find($id);
        return view('funcionarios.edit',['funcionario'=>$funcionario,'cargos'=>$cargos]);
    }

    /**
     * Actualiza un registro especifico en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $funcionario = Funcionario::find($id);
        $funcionario->fill($request->all());
        $funcionario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * Me genera el control para abrir puertas segun el usuario
     * que este log en la aplicacion
     */
    public function controlpuertas()
    {
        //
    }
}
