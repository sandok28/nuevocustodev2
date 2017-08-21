<?php

namespace App\Http\Controllers;
/**
 *Librerias necesarias para ejecutar las funciones
 *que la aplicacion va a necesitar.
 * */
use App\Cargo;
use App\Funcionario;
use App\Http\Requests\FuncionariosActualizarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FuncionariosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * por medio de la funcion compact a la vista asi permitiendo usar los
     * datos del modelo que se encuentran el la base de datos.
     */

    public  function tomarfoto()
    {
        return view('funcionarios.tomarfoto');
    }
    public function index()
    {
        $funcionarios=Funcionario::all();

        return view('funcionarios.index',compact('funcionarios'));
    }

    /**
     * La funcion crear me genera la variable $cargo con los datos
     * del modelo Cargo que se encuentra en la base de datos devolviendo una vista
     * de crear.blade.php con los datos del modelo.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cargos = Cargo::all();
        return view('funcionarios.create',compact('cargos'));
    }

    /**
     * Recibe los parametros de la vista create.blade del formulario en funcionarios
     * por medio de request y los almacena en la base de datos por medio del modelo
     * Funcionario con la funcion create.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(\App\Http\Requests\FuncionariosCrearRequest $request)
    {

            Funcionario::create([
                'nombre'=>$request['nombre'],
                'apellido'=>$request['apellido'],
                'cedula'=>$request['cedula'],
                'correo'=>$request['correo'],
                'tarjeta_rfid'=>$request['tarjeta_rfid'],
                'fecha_nacimiento'=>$request['fecha_nacimiento'],
                'cargo_id'=>'1',
                'foto'=>'0',
                'celular'=>$request['celular'],
                'hoario_normal'=>$request['horario'],
                'licencia'=>'1',
                'estatus'=>'0',
                'dado_de_baja'=>'0',
            ]);

        return redirect('/funcionarios')->with('message','El Usuario se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *El recurso no es utilizado para este proyecto
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $funcionario = Funcionario::find($id);
        return view('funcionarios.edit',['funcionario'=>$funcionario]);
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
        //dd($funcionario);
        return view('funcionarios.edit',['funcionario'=>$funcionario,'cargos'=>$cargos]);
    }

    /**
     * Update the specified resource in storage.
     * Modificando y Guardando la ultima configuracion que genera
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionariosActualizarRequest $request, $id)
    {

        $funcionario = Funcionario::find($id);
        $funcionario->fill($request->all());
        $funcionario->save();
        //Session::flash('message','Funcionario Actualizado Correctamente');
        return Redirect::to('/funcionarios');
    }

    /**
     * Remove the specified resource from storage.
     * No se usa para el proyecto.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * No se usa para el proyecto.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function horario($id)
    {


        $funcionario = Funcionario::find($id);

        $horariosEspeciales = $funcionario->horariosEspeciales;

        return view('funcionarios.horario',['funcionario'=>$funcionario,'horariosEspeciales'=>$horariosEspeciales]);
    }
}
