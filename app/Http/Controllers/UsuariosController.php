<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UsuariosPuerta;
use App\PermisosUsuario;
use App\Puerta;
use App\Permiso;
use Session;
use Redirect;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Collection;

class UsuariosController extends Controller
{

    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index',compact('usuarios'));

    }
    public function create()
    {

        return view('usuarios.create');
    }


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


    public function edit($id)
    {
        $usuario = User::find($id);

        return view('usuarios.edit',['usuario'=>$usuario]);
    }


    public function update(Request $request, $id)
    {


        $usuario = User::find($id);

        $todasPuertas = Puerta::all();
        foreach($todasPuertas as $puerta){
            //dd($request);
            if($request[$puerta->id]!=null){
                UsuariosPuerta::where('user_id', $usuario->id)
                    ->where('puerta_id', $request[$puerta->id])
                    ->update(['estatus_permiso' => 1]);
            }
            else{
                UsuariosPuerta::where('user_id', $usuario->id)
                    ->where('puerta_id', $puerta->id)
                    ->update(['estatus_permiso' => 0]);
            }
        }
        $todosPermiso = Permiso::all();
        foreach($todosPermiso as $permiso){
            //dd($request);
            if($request[$permiso->id]!=null){
                PermisosUsuario::where('usuario_id', $usuario->id)
                    ->where('permiso_id', $request[$permiso->id])
                    ->update(['estatus_permiso' => 1]);
            }
            else{
                PermisosUsuario::where('usuario_id', $usuario->id)
                    ->where('permiso_id', $permiso->id)
                    ->update(['estatus_permiso' => 0]);
            }
        }

        if($request->estatus == null) $request->estatus=$usuario->estatus;
        $variablesAdaptadas = [
            'name' => $request->name,
            'email'=> $request->name,
            'password'=> bcrypt($request->password),
            'estatus'=> $request->estatus
        ];


        $usuario->fill($variablesAdaptadas);
        $usuario->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/usuarios');
    }

}
