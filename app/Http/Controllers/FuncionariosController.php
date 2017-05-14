<?php

namespace App\Http\Controllers;

use App\Cargo;
use App\Funcionario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionariosController extends Controller
{
    //TODA ESTA CLASE LA TIENE QUE COMENTAR JARA
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
        $cargo = Cargo::find($id);
        $funcionario = Funcionario::find($id);
        return view('funcionarios.edit',['funcionario'=>$funcionario,'cargo'=>$cargo]);
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
