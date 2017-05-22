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
        //devuelve la vista index de usuarios y le paso una coleccion con todos los usuarios
        return view('usuarios.index',compact('usuarios'));

    }
    public function create()
    {
        //devuelve la vista create de usuarios
        return view('usuarios.create');
    }

    //Recibe $request con los datos del formulario de usuarios
    public function store(Request $request)
    {
        User::create([
            'name'=> $request['name'],
            'email'=> $request['name'],
            'password'=> bcrypt($request['password']),
            'estatus'=> '1',
        ]);
        //obtengo el ultimo usuario que se creo es decir la que acabamos de crear
        $usuario = User::orderBy('created_at', 'desc')->first();

        //Relaciono el usuario que se acabo de crear con todas las puertas existentes
        $todasPuertas = Puerta::all();
        foreach($todasPuertas as $puerta){
            UsuariosPuerta::create([
                'user_id' => $usuario->id,
                'puerta_id' => $puerta->id,
                'estatus_permiso' => 0
            ]);
        }
        //Relaciono le usuario que se acabo de crear con todos los permisos existentes
        $todosPermisos = Permiso::all();
        foreach($todosPermisos as $permiso){
            PermisosUsuario::create([
                'usuario_id' => $usuario->id,
                'permiso_id' => $permiso->id,
                'estatus_permiso' => 0
            ]);
        }
        //Redirecciono a la vista edit de la puerta que se acabo de crear
        return redirect('/usuarios/'.$usuario->id.'/edit')->with('message','El Usuario se ha registrado correctamente');
    }

    //Recibe el id del usuario
    public function edit($id)
    {
        $usuario = User::find($id);
        //Devuelvo la vista edit de usuarios y le paso la $usuario.
        return view('usuarios.edit',['usuario'=>$usuario]);
    }

    //Recibe $request con los datos del formulario y el id del usuario
    public function update(Request $request, $id)
    {
        //obtengo le usuario relacionado al id que llego
        $usuario = User::find($id);

        //creo una coleccion con todas las puertas
        $todasPuertas = Puerta::all();

        //las itero para obtener cada puerta registrada
        foreach($todasPuertas as $puerta){

            if($request[$puerta->id]!=null){
                //Si la puerta fue seclecionada en el check se guarda en la relacion usuario-puerta con un 1
                // indicando que este usuario tiene permiso sobre ella
                UsuariosPuerta::where('user_id', $usuario->id)
                    ->where('puerta_id', $request[$puerta->id])
                    ->update(['estatus_permiso' => 1]);
            }
            else{
                //Si la puerta no fue seclecionada en el check se guarda en la relacion usuario-puerta con un 0
                // indicando que este usuario no tiene permiso sobre ella
                UsuariosPuerta::where('user_id', $usuario->id)
                    ->where('puerta_id', $puerta->id)
                    ->update(['estatus_permiso' => 0]);
            }
        }

        //creo una coleccion con todos los permisos
        $todosPermiso = Permiso::all();

        //los itero para obtener cada permiso registrado
        foreach($todosPermiso as $permiso){

            if($request[$permiso->id]!=null){
                //Si el permiso fue seclecionada en el check se guarda en la relacion usuario-permiso con un 1
                // indicando que este usuario tiene ese permiso.
                PermisosUsuario::where('usuario_id', $usuario->id)
                    ->where('permiso_id', $request[$permiso->id])
                    ->update(['estatus_permiso' => 1]);
            }
            else{
                //Si el permiso no fue seclecionada en el check se guarda en la relacion usuario-permiso con un 0
                // indicando que este usuario no tiene ese permiso.
                PermisosUsuario::where('usuario_id', $usuario->id)
                    ->where('permiso_id', $permiso->id)
                    ->update(['estatus_permiso' => 0]);
            }
        }
        // si el check estatus es nulo le asigno el valor que tiene el usuario actualmente
        if($request->estatus == null) $request->estatus=$usuario->estatus;

        //creo un arreglo auxiliar para incorporrar el email enlos datos que se vana guardar en la base de datos
        $variablesAdaptadas = [
            'name' => $request->name,
            'email'=> $request->name,
            'password'=> bcrypt($request->password),
            'estatus'=> $request->estatus
        ];
        $usuario->fill($variablesAdaptadas);
        $usuario->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        //redirecciono a la vita index de usuarios
        return Redirect::to('/usuarios');
    }

}
