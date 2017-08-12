<?php

namespace App\Http\Controllers;

use App\Intervaloinvitado;
use App\IntervalofuncionarioPuerta;
use App\Puerta;
use App\IntervaloInvitadoPuerta;
use App\Intervalofuncionario;
use Illuminate\Http\Request;
use Session;
use Redirect;

class IntervalosFuncionariosController extends Controller
{
    /**
     * No hace nada en concreto solo llama a la vista create con el formulario para crear un intervalo de horario especial
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de cargos
     * y le paso
     * $funcionario_id id del funcionario al que pertenece
     * $puertasNormales una coleccion con todas las puestas normales
     * $puertasEspeciales una coleccion con todas las puertas especiales
     * @param integer $funcionario_id id del funcionario al que va pertenecer el horario especial
     */
    public function create($funcionario_id)
    {
        //creo una coleccion con todas las puertas especiales
        $puertasEspeciales = Puerta::All()->where('puerta_especial',1);
        //creo una coleccion con todas las puestas normales
        $puertasNormales = Puerta::All()->where('puerta_especial',0);

        return view('intervalos_funcionarios.create',['funcionario_id'=>$funcionario_id,'puertasNormales'=>$puertasNormales,'puertasEspeciales'=>$puertasEspeciales]);
    }

    /**
     * Crea un nuevo intervalo de horario especial con los datos que recibe del formulario
     * y lo asocia al funcionario relacionando el $funcionario_id que llega como parametro
     * Tambien relaciono el intervalo de horario especial que se crea con todas las puertas selecionadas
     * agrepandolo por dias.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciona a la vista horario del funcionario a la que pertenece el intervalo de horario especial
     * @param Request $request con los datos del formulario
     * @param integer $funcionario_id id del funcionario al que va pertenecer el intervalo de horario especia
     */
    public function store(Request $request,$funcionario_id)
    {

        $cont_dias = 0;
        if ($request->hasta_hora > $request->desde_hora) {
            $cont_dias = $this->crearSeccion($request,$funcionario_id);
        }
        else if($request->hasta_hora == $request->desde_hora && $request->hasta_minuto > $request->desde_minuto){
            $cont_dias = $this->crearSeccion($request,$funcionario_id);
        } else{
            return redirect('horariosespeciales/create/'.$funcionario_id)->with(['message'=>'Intervaloinvitado de tiempo invalido','tipo'=>'error']);
        }
        if( $cont_dias == 0 ){
            return redirect('horariosespeciales/create/'.$funcionario_id)->with(['message'=>'seleccione al menos un dia','tipo'=>'error']);
        }
            else{
        }
        return redirect('/funcionarios/horario/'.$funcionario_id)->with(['message'=>'El intervalo se ha registrado correctamente','tipo'=>'message']);
    }

    /**
     *  llama a la vista show de intervalos_funcionarios la cual muestra la informacion relacionada a un horario especial de un funcionario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de los intervalos
     * y le paso
     * $intervaloEspecial objeto del intervalo de horario especial que se quiere mostrar
     * $puertasNormales una coleccion con todas las puestas normales asociadas al intervalo
     * $puertasEspeciales una coleccion con todas las puertas especiales normales asociadas al intervalo de horario especial
     * @param integer $id id del intervalo de horario especial que se va a mostrar
     */
    public function show($id)
    {
        $intervaloEspecial = Intervalofuncionario::find($id);
        $puertasNormales = Intervalofuncionario::find($id)->puertas()->where('puerta_especial',0)->get();
        $puertasEspeciales = Intervalofuncionario::find($id)->puertas()->where('puerta_especial',1)->get();
        return view('intervalos_funcionarios.show',['intervaloEspecial'=>$intervaloEspecial ,'puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);
    }


    /**
     *  Elimina un intervalo de horario especial asociado al $id que llega como parametro
     * Tambien elimina todas las interrelaciones entre las puertas y dicho intervalo de horario especial
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista horario de funcionarios
     * @param integer $id id del intervalo de horario especial que se va a eliminar
     */
    public function destroy($id)
    {
        $Intervalos_funcionarios_puertas = IntervalofuncionarioPuerta::all()->where('intervalo_funcionario_id',$id);

        foreach($Intervalos_funcionarios_puertas as $Intervalo_funcionario_puerta){
            $Intervalo_funcionario_puerta->delete();

        }
        $funcionario_id = Intervalofuncionario::find($id)->funcionario_id;
        Intervalofuncionario::destroy($id);

        return redirect('/funcionarios/horario/'.$funcionario_id);
    }

    private function crearSeccion(Request $request,$funcionario_id){

        $todasPuertas = Puerta::all();
        $cont_dias = 0; //variable para saber si se selecciono un dia al menos


        //for que toma los dias selecionados en el formulario cada uno indentificados por los id 10001(lunes) a 10008(domingo) respectivamente
        // si fue selecciondo crea el horario especial y le asocia todas las puestas seleccioandas
        //dd($request['desde_hora'].":".$request['desde_minuto'].":0");

        for ($i = 10001; $i<10008; $i++){
            if($request[$i]!=null) {
                $cont_dias++;
                //guardo el intervalo de tiempo desde hasta y el dia
                Intervalofuncionario::create([
                    'desde'=> $request->desde_hora.":".$request->desde_minuto.":0",
                    'hasta'=> $request->hasta_hora.":".$request->hasta_minuto.":0",
                    'dia' => $request->$i,
                    'funcionario_id'=> $funcionario_id,
                ]);

                //obtengo el intervalo que se acabo de crear para asignarle las puertas y le resto un minuto a created_at para evitar
                //conflictor con los siguiente intervalos que se van a crear
                $intervaloEspecial = Intervalofuncionario::orderBy('created_at', 'desc')->first();
                $carbon = new \Carbon\Carbon();
                Intervalofuncionario::where('id', $intervaloEspecial->id)->update(['created_at' => $carbon->now()->subMinute()]);

                //Relaciono el intervalo que se acabo de crear con todas las puertas selecionadas
                $todasPuertas = Puerta::all();
                foreach($todasPuertas as $puerta){
                    //Si la puerta fue seclecionada en el check se guarda en la relacion secionn-puerta con un 1
                    // indicando que esta seccion tiene permiso sobre ella

                    if($request[$puerta->id]!=null) {
                        IntervalofuncionarioPuerta::create([
                            'intervalo_funcionario_id' => $intervaloEspecial->id,
                            'puerta_id' => $puerta->id,
                        ]);
                    }
                }
            }
        }
        return $cont_dias;
    }
}
