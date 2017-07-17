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

    /**
     * Llama a la vista index donde se listan todos los usuarios
     *
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de usuarios
     * y le paso
     * $usuarios coleccion con todas los usuarios
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * No hace nada en concreto solo llama a la vista create de usuarios
     *
     * @return \Illuminate\Http\Response devuelve la vista create de usuarios
     */
    public function create()
    {
        return view('usuarios.create');
    }


    /**
     * Crea un nuevo usuario con los datos que recibe del formulario
     * por defecto asigna el estatus del nuevo usuario en 1 indicando que esta activo
     * Relaciono el usuario que se acabo de crear con todas las puertas existentes
     * con un 0 en status indicando que estan inactivas.
     * y Relaciono el usuario que se acabo de crear con todos los permisos existentes
     * con un 0 en status indicando que estan inactivos.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciono a la vista edit del usuario que se acabo de crear
     * @param Request $request con los datos del formulario de usuarios
     */
    public function store(Request $request)
    {
        User::create([
            'name'=> $request['name'],
            'email'=> $request['name'],
            'password' => bcrypt($request['password']),
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
        return redirect('/usuarios/'.$usuario->id.'/edit')->with('message','El Usuario se ha registrado correctamente');
    }


    /**
     * Llama a la vista index donde se listan todos las secciones
     *
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Devuelvo la vista edit de usuarios .
     * y le paso
     * $usuario objeto del usuario a editar
     *  @param integer $id id del usuario a editar
     */
    //Recibe el id del usuario
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.edit',['usuario'=>$usuario]);
    }

    /**
     * Actualiza el usuario asociado al $id con los datos que trae el $request
     * En la relacion usuario y puertas asigna en status un 1 indicando que esta activa
     * si en el formulario fue marcada la puerta.
     * En la relacion usuario y puertas asigna en status un 0 indicando que esta inactiva
     * si en el formulario no fue marcada la puerta.
     * En la relacion usuario y permisos asigna en status un 1 indicando que esta inactivos
     * si en el formulario fue marcado el permiso.
     * En la relacion usuario y permisos asigna en status un 0 indicando que esta inactivos
     * si en el formulario no fue marcado el permiso.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciono a la vita index de usuarios
     * @param Request $request con los datos del formulario de usuarios
     * @param $id id del usuario que se quiere actualizar la informacion
     */
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
            
            if($request[($permiso->id+10000)]!=null){

                //Si el permiso fue seclecionada en el check se guarda en la relacion usuario-permiso con un 1
                // indicando que este usuario tiene ese permiso.
                PermisosUsuario::where('usuario_id', $usuario->id)
                    ->where('permiso_id', $request[$permiso->id+10000])
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
        if($request->password == null) $request->password=$usuario->password;
        //creo un arreglo auxiliar para incorporrar el email enlos datos que se vana guardar en la base de datos
        $variablesAdaptadas = [
            'name' => $request->name,
            'email'=> $request->name,
            'password'=> $request->password,
            'estatus'=> $request->estatus
        ];
        $usuario->fill($variablesAdaptadas);
        $usuario->save();
        Session::flash('message','Usuario Actualizado Correctamente');

        return Redirect::to('/usuarios');
    }

}
