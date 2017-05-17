<?php

namespace App\Http\Controllers;

use App\Puerta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PuertasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        $puerta = Puerta::fin($id);
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
                'llave_rfid'=>$request->all()['llave'],
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
