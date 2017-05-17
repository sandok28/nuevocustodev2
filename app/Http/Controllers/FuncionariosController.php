<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            Funcionario::create([
                'nombre'=>$request['nombre'],
                'apelido'=>$request['apellido'],
                'cedula'=>$request['cedula'],
                'correo'=>$request['email'],
                'tarjeta_rfid'=>$request['rfid'],
                'cargos_id'=>'1',
                'foto'=>'ljljkjl',
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargos = Cargo::all();
        $funcionario = Funcionario::find($id);
        return view('funcionarios.edit',['funcionario'=>$funcionario,'cargos'=>$cargos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $variablesAdaptadas = [
            'nombre' => $request->all()['nombre'],
            'apelido'=> $request->all()['apellido'],
            'cedula'=> $request->all()['cedula'],
            'celular'=> $request->all()['celular'],
            'correo'=> $request->all()['email'],
            'tarjeta_rfid'=> $request->all()['rfid'],
            'cargos_id'=> $request->all()['Cargo'],
            'hoario_normal'=> $request->all()['asignar_horario_nomal'],
            //'fecha_nacimiento' => $request->all()[''],
            'foto'=> $request->all()['0'],
            'licencia'=> $request->all()[0],
            'estatus'=> $request->all()[1],
            'dado_de_baja'=> $request->all()[0],

        ];
        $funcionario = Funcionario::find($id);
        $funcionario->fill($variablesAdaptadas);
        $funcionario->save();
        Session::flash('message','Funcionario Actualizado Correctamente');
        return Redirect::to('/Funcionarios');
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
}
