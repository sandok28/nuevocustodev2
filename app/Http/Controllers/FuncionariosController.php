<?php

namespace App\Http\Controllers;

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
        return view('funcionarios.create');
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
                'nombre'=>'nombre',
                'apelido'=>'apelido',
                'cedula'=>'1234',

                'correo'=>'correo',
                'tarjeta_rfid'=>'1234',
                'cargos_id'=>'1',
                'foto'=>'ljljkjl',
                'celular'=>'3333',
                'hoario_normal'=>'11',
                'licencia'=>'1',
                'estatus'=>'0',
                'dado_de_baja'=>'1',
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
        //
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
