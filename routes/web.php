<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});
Route::get('/', 'HomeController@index');
Route::get('iniciosession','HomeController@iniciosession');
Route::post('login','HomeController@login')->name('home.login');
Route::get('logout','HomeController@logout')->name('home.logout');

Route::resource('usuarios','UsuariosController');
Route::resource('funcionarios','FuncionariosController');
Route::resource('puertas','PuertasController');

Route::get('errores','ErroresController@error404')->name('errores.error404');