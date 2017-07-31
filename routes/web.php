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

Route::Get('/tomarFoto','FuncionariosController@tomarfoto');

Route::resource('usuarios','UsuariosController',['except' => ['show','destroy']]);

Route::resource('funcionarios','FuncionariosController');
Route::resource('puertas','PuertasController');
Route::resource('controlareas','ControllerControlAreas');

Route::resource('secciones','SeccionesController',['except' => ['show','destroy']]);

Route::resource('cargos','CargosController',['only' => ['update','edit']]);
Route::get('cargos/create/{seccion_id}', 'CargosController@create')->name('cargos.create');
Route::post('cargos/{seccion_id}', 'CargosController@store')->name('cargos.store');

Route::resource('invitados','InvitadosController',['except' => ['show','destroy']]);

Route::resource('invitados','InvitadosController',['except' => ['show','destroy']]);

Route::resource('licencias','LicenciasController',['except' => ['show','destroy','create','store']]);
Route::get('licencias/create/{funcionario_id}','LicenciasController@create')->name('licencias.create');
Route::post('licencias/{funcionario_id}','LicenciasController@store')->name('licencias.store');


Route::resource('intervalos','IntervalosController',['only' => ['show','destroy']]);
Route::get('intervalos/create/{invitado_id}', 'IntervalosController@create')->name('intervalos.create');
Route::post('intervalos/{invitado_id}', 'IntervalosController@store')->name('intervalos.store');


Route::get('errores','ErroresController@error404')->name('errores.error404');

Route::resource('GestionAreas','GestionAreasController');
Route::get('area/{user_id}','GestionAreasController@controlareas');

Route::get('Estadisticas','EstadisticasController@index');

Route::get('Reportes','ReportesController@index');
