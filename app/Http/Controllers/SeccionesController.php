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

    /**
     * Llama a la vista index donde se listan todos las secciones
     *
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de secciones
     * y le paso
     * $secciones coleccion con todas las $secciones
     */
    public function index()
    {
        $secciones = Seccion::all();
        return view('secciones.index',compact('secciones'));
    }

    /**
     * No hace nada en concreto solo llama a la vista create de secciones
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de secciones
     */
    public function create()
    {
        return view('secciones.create');
    }

    /**
     * Crea una nueva seccion con los datos que recibe del formulario
     * por defecto asigna el estatus de la nueva seccion en 1 indicando que esta activa
     * Relaciono la seccion que se acabo de crear con todas las puertas existentes
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista edit de secciones de la seccion que se creo
     * @param Request $request con los datos del formulario de secciones
     */
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

        return redirect('/secciones/'.$seccion->id.'/edit')->with('message','La seccion se ha registrado correctamente');

    }

    /**
     * llama a la vista edit de secciones
     * la cual tiene el formulario de secciones
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de secciones
     * y le paso
     * $seccion objeto de la seccion asociada al $id que llega por parametro.
     * $puertasEspeciales coleccion con todas las puertas especiales relacionas a la seccion
     * $puertasNormales coleccion con todas las puestas normales relacionas a la seccion
     * @param integer $id id de la licencia a editar
     */
    public function edit($id)
    {
        //obtengo la seccion relacionada al id que llego
        $seccion = Seccion::find($id);
        //creo una coleccion con todas las puertas especiales relacionas a la seccion
        $puertasEspeciales = Seccion::find($id)->puertas()->where('puerta_especial',1)->get();
        //creo una coleccion con todas las puestas normal relacionas a la seccion
        $puertasNormales = Seccion::find($id)->puertas()->where('puerta_especial',0)->get();

        //Devuelvo la vista edit de secciones y le paso la $seccion, $puertasEspeciales y $puertasNormales.
        return view('secciones.edit',['seccion'=>$seccion,'puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);
    }


    /**
     * Actualiza la seccion asociada al $id con los datos que trae el $request
     * Tambien relaciona la seccion que se crea con todas las puertas selecionadas
     * en el formulario
     *
     * @author Edwin Sandoval.
     * @return \Illuminate\Http\Response Redirecciono a la vita index de secciones
     * @param Request $request con los datos del formulario.
     * @param integer $id id de la seccion que se quiere actualizar.
     */
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

        return Redirect::to('/secciones');
    }
}
