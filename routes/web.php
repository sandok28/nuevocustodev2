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


Route::get('/home', 'HomeController@index');
Route::get('/','HomeController@iniciosession');
Route::post('login','HomeController@login')->name('home.login');
Route::get('logout','HomeController@logout')->name('home.logout');

Route::resource('usuarios','UsuariosController',['except' => ['show','destroy']]);

Route::resource('funcionarios','FuncionariosController');

Route::resource('secciones','SeccionesController',['except' => ['show','destroy']]);

Route::resource('invitados','InvitadosController',['except' => ['show','destroy']]);
Route::get('invitados/foto','InvitadosController@foto')->name('invitados.foto');

Route::resource('cargos','CargosController',['only' => ['update','edit']]);
Route::get('cargos/create/{seccion_id}', 'CargosController@create')->name('cargos.create');
Route::post('cargos/{seccion_id}', 'CargosController@store')->name('cargos.store');

Route::get('errores','ErroresController@error404')->name('errores.error404');