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


    function index(){
        //devuelve la vista index de home la cual es la vita general del software
        return view('home.index');
    }

    function iniciosession(){
        //actulemnte esta vita es la raiz "/" en las rutas
        //devuelve la vista login de home la cual es la vita donde lo usuarios pueden logear
        return view('home.login');
    }
    //Recibe $request con los datos del formulario del login nombre de usuario y contraseña
    function login(LoginRequest $request){
        //nombre de usuario lo recibimos como email para poder usar las librerias que nos brinda laravel

        if(Auth::attempt(['email'=>$request['email'], 'password'=> $request['password']])){
            //si los datos son correctos redireccionamos a la vista index de home del software
            return Redirect::to('/home');
        }
        Session::flash('message-error','Datos son incorrectos');
        //si los datos no son correctos redireccionamos a la rails es decir a la vista login de home
        return Redirect::to('/');

    }
    //Recibe $request con los datos del usuario que se encuentra logeado y cierra la sesion
    public function logout(LoginRequest $request)
    {
        Auth::logout();//cuerra la session
        //redireccionamos a la rails es decir a la vista login de home
        return Redirect::to('/');
    }
}
