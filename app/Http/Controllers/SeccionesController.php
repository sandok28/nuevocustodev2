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
        $secciones = Seccion::all();
        //devuelve la vista index de secciones y le paso una coleccion con todas las secciones
        return view('secciones.index',compact('secciones'));
    }

    public function create()
    {
        //devuelve la vista create de secciones
        return view('secciones.create');
    }


    //Recibe $request con los datos del formulario de secciones
    public function store(Request $request)
    {
        Seccion::create([
            'nombre'=> $request['nombre'],
            'estatus'=> '1',
        ]);

        //obtengo la ultima seccion que se creo es decir la que acabamos de crear
        $seccion = Seccion::orderBy('created_at', 'desc')->first();

        //Relaciono la seccion que se acabo de crear con todas las puertas existentes
        $todasPuertas = Puerta::all();
        foreach($todasPuertas as $puerta){
            SeccionesPuerta::create([
                'seccion_id' => $seccion->id,
                'puerta_id' => $puerta->id,
                'estatus_permiso' => 0
            ]);
        }
        //Redirecciono a la vista edit de la seccion que se acabo de crear
        return redirect('/secciones/'.$seccion->id.'/edit')->with('message','La seccion se ha registrado correctamente');

    }

    //Recibe el id de la seccion
    public function edit($id)
    {
        //obtengo la seccion relacionada al id que llego
        $seccion = Seccion::find($id);
        //creo una coleccion con todas las puestas especiales relacionas a la seccion
        $puertasEspeciales = Seccion::find($id)->puertas()->where('puerta_especial',1)->get();
        //creo una coleccion con todas las puestas normal relacionas a la seccion
        $puertasNormales = Seccion::find($id)->puertas()->where('puerta_especial',0)->get();

        //Devuelvo la vista edit de secciones y le paso la $seccion, $puertasEspeciales y $puertasNormales.
        return view('secciones.edit',['seccion'=>$seccion,'puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);
    }

    //Recibe $request con los datos del formulario y el id de la seccion
    public function update(Request $request, $id)
    {
        //obtengo la seccion relacionada al id que llego
        $seccion = Seccion::find($id);

        //creo una coleccion con todas las puertas
        $todasPuertas = Puerta::all();

        //las itero para obtener cada puerta registrada
        foreach($todasPuertas as $puerta){
            //Si la puerta fue seclecionada en el check se guarda en la relacion secionn-puerta con un 1
            // indicando que esta seccion tiene permiso sobre ella
            if($request[$puerta->id]!=null){
                SeccionesPuerta::where('seccion_id', $seccion->id)
                    ->where('puerta_id', $request[$puerta->id])
                    ->update(['estatus_permiso' => 1]);
            }
            else{
                //Si la puerta no fue seclecionada en el check se guarda en la relacion secionn-puerta con un 0
                // indicando que esta seccion no tiene permiso sobre ella
                SeccionesPuerta::where('seccion_id', $seccion->id)
                    ->where('puerta_id', $puerta->id)
                    ->update(['estatus_permiso' => 0]);
            }
        }
        //actualizo la informacion como tal
        $seccion->fill($request->all());
        $seccion->save();
        Session::flash('message','Seccion Actualizada Correctamente');

        //Redirecciono a la vita index de secciones
        return Redirect::to('/secciones');
    }
}
