<?php

namespace App\Http\Controllers;

use App\Puerta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Redirect;

class PuertasController extends Controller
{
    /**
     * Llama la vista index de GestionAreas y genera la variable puertas
     * que contiene los datos que son tomados del modelo Puertas
     * y se pasa por meido de la funcion compact a la vista.
     */
    public function index()
    {
        //
        $puertas=Puerta::all();
        return view('GestionAreas.index',compact('puertas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('GestionAreas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        Puerta::create([
            'puerta_especial' => $request['puerta_especial'],
            'nombre' => $request['nombre'],
            'llave_rfid' => $request['llave'],
            'estatus' => '1',
            'ip' => $request['ip'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $puerta = Puerta::find($id);
        return view('GestionAreas.edit',['puerta'=>$puerta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
            $variablesAdaptadas = [
                'nombre'=> $request->all()['nombre'],
                'llave_rfid'=>$request->all()['llave_rfid'],
                'ip'=>$request->all()['ip'],
                'puerta_especial' => $request->all()['puerta_especial'],

            ];
            $puerta = Puerta::find($id);
            $puerta->fill($variablesAdaptadas);
            $puerta->save();
            Session::flash('message','Puerta Actualizado Correctamente');
            return Redirect::to('puertas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
