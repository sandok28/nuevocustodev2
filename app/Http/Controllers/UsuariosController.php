<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\UserPuerta;
use App\PermisoUser;
use App\Puerta;
use App\Permiso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Collection;

class UsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarUsuariosMiddleware',['except' => ['editUsuarioActual', 'updateUsuarioActual']]);
    }


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

    public function lista_usuarios()
    {
        $usuarios= User::select(['id','name','created_at','updated_at','estatus'])->get();
        return \Datatables::of($usuarios)
            ->addColumn('action', function ($usuario) {
                $aciones ="";
                $aciones ="<div class='btn btn-group'>";
                $aciones =$aciones.'<a href="'.route('usuarios.edit',$usuario->id).'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                $aciones =$aciones."</div>";

                return $aciones;
            })
            ->make(true);
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
        $this->validate($request, [
            'name' => 'required|unique:Users|min:4',
            'password' => 'required|min:6',
        ]);

        if ($request->password!= $request->password_confirmacion){
            return redirect('/usuarios/create')->with(['message'=>'Las contraseñas no coinciden','tipo'=>'error']);
        }

        try {
            DB::beginTransaction();


                User::create([
                    'name'=> $request['name'],
                    'email'=> $request['name'],
                    'password' => bcrypt($request['password']),
                    'estatus'=> '1',
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                ]);

                //obtengo el ultimo usuario que se creo es decir la que acabamos de crear

                $usuario = DB::table('Users')
                                ->select('id')
                                ->orderBy('created_at', 'desc')
                                ->first();


                //Relaciono el usuario que se acabo de crear con todas las puertas existentes
                $todasPuertas = Puerta::all();
                foreach($todasPuertas as $puerta){
                    DB::table('Puertas_Users')->insert([
                        'user_id' => $usuario->id,
                        'puerta_id' => $puerta->id,
                        'estatus_permiso' => 0
                    ]);
                }
                //Relaciono le usuario que se acabo de crear con todos los permisos existentes
                $todosPermisos = Permiso::all();
                foreach($todosPermisos as $permiso){
                    DB::table('Permisos_Users')->insert([
                        'usuario_id' => $usuario->id,
                        'permiso_id' => $permiso->id,
                        'estatus_permiso' => 0
                    ]);
                }

            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            return redirect('/usuarios/create')->with(['message'=>'Algo salio mal','tipo'=>'error']);
        }
        return redirect('/usuarios/'.$usuario->id.'/edit')->with(['message'=>'El Usuario se ha registrado correctamente','tipo'=>'message']);
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

        $this->validate($request, [
            'name' => 'min:4|required|unique:Users,name,'.$id,
        ]);

        if ($request->password!= $request->password_confirmacion){
            return redirect('/usuarios/'.$id.'/edit')->with(['message'=>'Las contraseñas no coinciden','tipo'=>'error']);
        }

        try {
            DB::beginTransaction();

                //obtengo le usuario relacionado al id que llego

                $usuario = User::find($id);

                //creo una coleccion con todas las puertas
                $todasPuertas = Puerta::all();


                //Hago que todas las puertas tengan estatus_permiso en 0
                DB::table('Puertas_Users')
                    ->where('user_id', $usuario->id)
                    ->update(['estatus_permiso' => 0]);

                //las itero para obtener cada puerta registrada y maro las seleccionadas con estatus_permiso en 1
                foreach($todasPuertas as $puerta){

                    if($request[$puerta->id]!=null){
                        //Si la puerta fue seclecionada en el check se guarda en la relacion usuario-puerta con un 1
                        // indicando que este usuario tiene permiso sobre ella
                        DB::table('Puertas_Users')
                            ->where([
                                ['user_id','=', $usuario->id],
                                ['puerta_id','=', $request[$puerta->id]]
                                ])
                            ->update(['estatus_permiso' => 1]);
                    }
                }

                //creo una coleccion con todos los permisos
                $todosPermiso = Permiso::all();


                //los itero para obtener cada permiso registrado y marco los seleccionados con estatus_permiso en 1
                foreach($todosPermiso as $permiso){

                    if($request[($permiso->id+10000)]!=null){

                        //Si el permiso fue seclecionada en el check se guarda en la relacion usuario-permiso con un 1
                        // indicando que este usuario tiene ese permiso.
                        $permisoUser = PermisoUser::where([
                                ['usuario_id','=', $usuario->id],
                                ['permiso_id','=', $permiso->id],
                                ])->get();

                        $permisoUser[0]->update(['estatus_permiso' => 1]);
                    }else{
                        //Si el permiso fue seclecionada en el check se guarda en la relacion usuario-permiso con un 1
                        // indicando que este usuario tiene ese permiso.
                        $permisoUser = PermisoUser::where([
                            ['usuario_id','=', $usuario->id],
                            ['permiso_id','=', $permiso->id],
                        ])->get();

                        $permisoUser[0]->update(['estatus_permiso' => 0]);

                    }
                }
                // si el check estatus es nulo le asigno el valor que tiene el usuario actualmente
                if($request->estatus == null) $request->estatus=$usuario->estatus;
                if($request->password == null) $request->password=$usuario->password;

                if($request['password']!=null) {
                    User::find($id)
                        ->update([
                            'name' => $request->name,
                            'email'=> $request->name,
                            'password'=> bcrypt($request['password']),
                            'estatus'=> $request->estatus,

                        ]);
                }
                else{
                    User::find($id)
                        ->update([
                            'name' => $request->name,
                            'email'=> $request->name,
                            'estatus'=> $request->estatus,

                        ]);
                }

            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            return redirect('/usuarios/'.$id.'/edit')->with(['message'=>'Algo salio mal','tipo'=>'error']);
        }
        return redirect('/usuarios')->with(['message'=>'Usuario Actualizado corectamente','tipo'=>'message']);
    }

    public function editUsuarioActual()
    {
        return view('usuarios.edit_usuario_actual');
    }
    public function updateUsuarioActual(Request $request)
    {

        $this->validate($request, [
            'name' => 'min:4|required|unique:Users,name,'.Auth::User()->id,
        ]);


        if ($request->password!= $request->password_confirmacion){
            return redirect('/usuario_actual/edit')->with(['message'=>'Las contraseñas no coinciden','tipo'=>'error']);
        }

        try {
            DB::beginTransaction();

            //obtengo le usuario relacionado al id que llego
            $usuario = User::find(Auth::User()->id);

            if($request->password == null) $request->password=$usuario->password;

            if($request['password']!=null) {
                User::find(Auth::User()->id)
                    ->update([
                        'name' => $request->name,
                        'email'=> $request->name,
                        'password'=> bcrypt($request['password']),
                        'updated_at'=>Carbon::now()->toDateTimeString(),
                    ]);
            }
            else{
                User::find(Auth::User()->id)
                    ->update([
                        'name' => $request->name,
                        'email'=> $request->name,
                        'updated_at'=>Carbon::now()->toDateTimeString(),
                    ]);
            }

            DB::commit();
        } catch (\Exception $ex){

            DB::rollback();
            return redirect('/usuario_actual/edit')->with(['message'=>'Algo salio mal','tipo'=>'error']);
        }
        return redirect('/home')->with(['message'=>'Usuario Actualizado corectamente','tipo'=>'message']);
    }


}
