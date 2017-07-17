<?php

namespace App\Http\Controllers;

use App\Intervalo;
use App\Puerta;
use App\IntervaloPuerta;
use Illuminate\Http\Request;
use Session;
use Redirect;

class IntervalosController extends Controller
{

    /**
     * No hace nada en concreto solo llama a la vista create
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de cargos
     * y le paso
     * $invitado_id id del invitado al que pertenece
     * $puertasNormales una coleccion con todas las puestas normales
     * $puertasEspeciales una coleccion con todas las puertas especiales
     * @param integer $seccion_id id del invitado al que va pertenecer el invitado
     */
    public function create($invitado_id)
    {
        //creo una coleccion con todas las puertas especiales
        $puertasEspeciales = Puerta::All()->where('puerta_especial',1);
        //creo una coleccion con todas las puestas normales
        $puertasNormales = Puerta::All()->where('puerta_especial',0);

        return view('intervalos.create',['invitado_id'=>$invitado_id,'puertasNormales'=>$puertasNormales,'puertasEspeciales'=>$puertasEspeciales]);
    }

    /**
     * Crea un nuevo intervalo con los datos que recibe del formulario
     * y lo asocia al invitado relacionado al $invitado_id que llega como parametro
     * Tambien relaciono el intervalo que se crear con todas las puertas selecionadas
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciona a la vista edit del invitado a la que pertenece el intervalo
     * @param Request $request con los datos del formulario
     * @param integer $invitado_id id del invitado al que va pertenecer el cargo
     */
    public function store(Request $request,$invitado_id)
    {
        Intervalo::create([
            'desde'=> $request['desde'],
            'hasta'=> $request['hasta'],
            'targeta_rfid' => $request['targeta_rfid'],
            'invitado_id'=> $invitado_id,
        ]);

        //obtengo la ultima seccion que se creo es decir la que acabamos de crear
        $intervalo = Intervalo::orderBy('created_at', 'desc')->first();

        //Relaciono el intervalo que se acabo de crear con todas las puertas selecionadas
        $todasPuertas = Puerta::all();
        foreach($todasPuertas as $puerta){
            //Si la puerta fue seclecionada en el check se guarda en la relacion secionn-puerta con un 1
            // indicando que esta seccion tiene permiso sobre ella
            if($request[$puerta->id]!=null) {
                IntervaloPuerta::create([
                    'intervalo_id' => $intervalo->id,
                    'puerta_id' => $puerta->id,
                ]);
            }
        }
        return redirect('/invitados/'.$invitado_id.'/edit')->with('message','El intervalo se ha registrado correctamente');
    }

    /**
     *  llama a la vista show de intervalos la cual muestra la informacion relacionada a un intervalo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de los intervalos
     * y le paso
     * $intervalo objeto del intervalo que se quiere mostrar
     * $puertasNormales una coleccion con todas las puestas normales asociadas al intervalo
     * $puertasEspeciales una coleccion con todas las puertas especiales normales asociadas al intervalo
     * @param integer $id id del intervalo que se va a mostrar
     */
    public function show($id)
    {
        $intervalo = Intervalo::find($id);
        $puertasNormales = Intervalo::find($id)->puertas()->where('puerta_especial',0)->get();
        $puertasEspeciales = Intervalo::find($id)->puertas()->where('puerta_especial',1)->get();
        //devuelve la vista edit de los intervalos
        return view('intervalos.show',['intervalo'=>$intervalo,'puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);
    }


    /**
     *  Elimina un intervalo asociado al $id que llega como parametro
     * Tambien eliman todas las interrelaciones entre las pertas y dicho intervalo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de los invitados
     * @param integer $id id del intervalo que se va a eliminar
     */
    public function destroy($id)
    {

        $invitado_id = Intervalo::find($id)->invitado_id;
        $puertasIntervalo = IntervaloPuerta::all()->where('intervalo_id',$invitado_id);

        foreach($puertasIntervalo as $puerta){
            $puerta->delete();
        }
        Intervalo::destroy($id);
        //devuelve la vista edit de los intervalos
        return redirect('/invitados/'.$invitado_id.'/edit');
    }
}
