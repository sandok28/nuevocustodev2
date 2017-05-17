<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Cargo;
use App\Puerta;
use App\SeccionesPuerta;
use Session;
use Redirect;
class SeccionesController extends Controller
{

    public function index()
    {


        $cargos = Seccion::find(1)->cargos;
        $secciones = Seccion::all();

        return view('secciones.index',compact('secciones'));

    }
    public function create()
    {
        $cargos = Cargo::all();
        return view('secciones.create',compact('cargos'));
    }



    public function store(Request $request)
    {
        Seccion::create([
            'nombre'=> $request['nombre'],
            'estatus'=> '1',
        ]);
        $seccion = Seccion::orderBy('created_at', 'desc')->first();
        $todasPuertas = Puerta::all();
        foreach($todasPuertas as $puerta){
            SeccionesPuerta::create([
                'seccion_id' => $seccion->id,
                'puerta_id' => $puerta->id,
                'estatus_permiso' => 0
            ]);
        }
        return redirect('/secciones/'.$seccion->id.'/edit')->with('message','La seccion se ha registrado correctamente');

    }


    public function edit($id)
    {
        $seccion = Seccion::find($id);
        $puertasEspeciales = Seccion::find($id)->puertas()->where('puerta_especial',1)->get();
        $puertasNormales = Seccion::find($id)->puertas()->where('puerta_especial',0)->get();
        return view('secciones.edit',['seccion'=>$seccion,'puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);
    }

    public function update(Request $request, $id)
    {
        $seccion = Seccion::find($id);
        $todasPuertas = Puerta::all();
        foreach($todasPuertas as $puerta){
            //dd($request);
            if($request[$puerta->id]!=null){
                SeccionesPuerta::where('seccion_id', $seccion->id)
                    ->where('puerta_id', $request[$puerta->id])
                    ->update(['estatus_permiso' => 1]);
            }
            else{
                SeccionesPuerta::where('seccion_id', $seccion->id)
                    ->where('puerta_id', $puerta->id)
                    ->update(['estatus_permiso' => 0]);
            }
        }

        $seccion->fill($request->all());
        $seccion->save();
        Session::flash('message','Seccion Actualizada Correctamente');
        return Redirect::to('/secciones');
    }
}
