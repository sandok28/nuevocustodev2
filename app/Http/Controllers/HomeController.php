<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;

class HomeController extends Controller
{
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
            return Redirect::to('/home');
        }
        Session::flash('message-error','Datos son incorrectos');
        return Redirect::to('/');
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
        return Redirect::to('/');
    }
}
