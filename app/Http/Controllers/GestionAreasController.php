<?php

namespace App\Http\Controllers;

use App\Puerta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionAreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $puertas = Puerta::all();
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
        //
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

    public function controlareas($id)
    {
        $puertasNormales = Auth::User()->puertas->where('puerta_especial',0);
        $puertasEspeciales = Auth::User()->puertas->where('puerta_especial',1);
        //dd('hola putos');
        //dd($puertasEspeciales,$puertasNormales);

        //devuelve la vista edit de los intervalos
        return view('ControlAreas.index',['puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);

    }
}
