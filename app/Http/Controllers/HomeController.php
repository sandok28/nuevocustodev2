<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only'=>'index']);
    }


    //ESTA CLASE SE ENCARGA DE TODAS LAS VISTAS GENERALES QUE NO PERTENECEN AUN MODULO EN PARTICULAR

    /**
     * No hace nada en concreto solo llama a la vista Home
     * esta vista es la vista principal del programa
     *
     * @author Edwin_Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de home la cual es la vita general del software
     */
    function index(){
        return view('home.index');
    }

    function inicial(){

        $progreso =0;

        $num_puertas = DB::table('Puertas')->count();
        $num_control_puertas = DB::table('Puertas_Users')
                            ->where('estatus_permiso','1')
                            ->count();
        $num_horario_general= DB::table('HorariosGenerales')->count();
        $num_secciones= DB::table('secciones')->count();
        $num_cargos= DB::table('cargos')->count();
        $num_funcionarios= DB::table('funcionarios')->count();
        $num_usuarios= DB::table('users')->count();

        if($num_puertas > 0) $progreso = $progreso + 15;
        if($num_control_puertas > 0) $progreso = $progreso + 5;
        if($num_horario_general > 0) $progreso = $progreso + 20;
        if($num_secciones > 0) $progreso = $progreso + 15;
        if($num_cargos > 0) $progreso = $progreso + 15;
        if($num_funcionarios > 0) $progreso = $progreso + 15;
        if($num_usuarios > 1) $progreso = $progreso + 15;

        return view('home.inicial',['progreso'=>$progreso,
            'num_puertas'=>$num_puertas,
            'num_control_puertas'=>$num_control_puertas,
            'num_horario_general'=>$num_horario_general,
            'num_secciones'=>$num_secciones,
            'num_cargos'=>$num_cargos,
            'num_funcionarios'=>$num_funcionarios,
            'num_usuarios'=>$num_usuarios
            ]);
    }

    /**
     * No hace nada en concreto solo llama a la vista Login
     * actulemnte esta vita es la raiz "/" en las rutas
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista login de home la cual es la vita donde lo usuarios pueden logear
     */
    function iniciosession(){
        return view('home.login');
    }

    /**
     * Verifica los datos del usuriario e inicia sesion con la ayuda de la libreria Auth
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redireccina a la vista Home si los datos del usuario son correctos
     * en caso contrario redirecciona a la vista de Login de nuevo
     * @param LoginRequest $request con los datos del formulario de login nombre y contraseña
     */
    function login(LoginRequest $request){
        if(Auth::attempt(['email'=>$request['email'], 'password'=> $request['password']])){
            return redirect('/home');
        }
        return redirect('/')->with(['message'=>'Contraseña o Usuario Invalido','tipo'=>'error']);
    }

    /**
     * Cierra sesion con la ayuda de la libreria Auth
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista de login de home
     * @param LoginRequest $request con los datos del formulario de login nombre y token
     */
    public function logout(LoginRequest $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
