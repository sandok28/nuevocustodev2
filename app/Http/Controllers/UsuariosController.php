<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Redirect;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Collection;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index',compact('usuarios'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name'=> $request['name'],
            'email'=> $request['name'],
            'password'=> bcrypt($request['password']),
            'estatus'=> '1',
        ]);


        return redirect('/usuarios')->with('message','El Usuario se ha registrado correctamente');

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
        $usuario = User::find($id);

        return view('usuarios.edit',['usuario'=>$usuario]);
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
        $variablesAdaptadas = [
            'name' => $request->all()['name'],
            'email'=> $request->all()['name'],
            'password'=> bcrypt($request->all()['password']),
            'estatus'=> $request->all()['estatus']
        ];
        $usuario = User::find($id);
        $usuario->fill($variablesAdaptadas);
        $usuario->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usuarios');
    }

    public function destroy($id)
    {
        //
    }
}
