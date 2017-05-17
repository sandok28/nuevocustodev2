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
    function index(){
        return view('home.index');
    }

    function iniciosession(){
        return view('home.login');
    }
    function login(LoginRequest $request){

        if(Auth::attempt(['email'=>$request['email'], 'password'=> $request['password']])){
            return Redirect::to('/home');
        }
        Session::flash('message-error','Datos son incorrectos');
        return Redirect::to('/');





        dd($request->name);
        return $request->name;

        return view('home.login');
    }

    public function logout(LoginRequest $request)
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
