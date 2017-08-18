<?php

namespace App\Http\Controllers;

use App\Horariogeneral;
use Illuminate\Http\Request;
use App\Invitado;
use Illuminate\Validation\Rules\In;
use Session;
use Redirect;

class HorariosGeneralesController extends Controller
{

    public function index()
    {
        $intervalosHorarioGeneral = Horariogeneral::all();
        return view('horarios_generales.index',compact('intervalosHorarioGeneral'));
    }

    /**
     * No hace nada en concreto solo llama a la vista create de los horarios generales
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de de los horarios_generales
     */
    public function create()
    {
        return view('horarios_generales.create');
    }



    /**
     * Crea un nuevo intervalo del horario general con los datos que recibe del formulario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciona a la vista index de los horarios generales
     * @param Request $request variable con los datos del formulario
     */
    public function store(Request $request)
    {

        $cont_dias = 0;
        if ($request->hasta_hora > $request->desde_hora) {

            $cont_dias = $this->crearIntervalosPorNDias($request);
        }
        else if($request->hasta_hora == $request->desde_hora && $request->hasta_minuto > $request->desde_minuto){
            $cont_dias = $this->crearIntervalosPorNDias($request);
        } else{
            return redirect('horariogeneral/create')->with(['message'=>'Intervalo de tiempo invalido','tipo'=>'error']);
        }
        if($cont_dias == 0){
            return redirect('horariogeneral/create')->with(['message'=>'Seleccione al menos un dia','tipo'=>'error']);
        }

        return redirect('/horariogeneral')->with(['message'=>'El intervalo general se ha registrado correctamente','tipo'=>'message']);
    }


    /**
     *  Elimina un intervalo del horario general asociado al $id que llega como parametro
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de los horarios generales
     * @param integer $id id del intervalo genral que se va a eliminar
     */
    public function destroy($id)
    {
        Horariogeneral::destroy($id);
        //devuelve la vista edit de los intervalos_invitados
        return redirect('/horariogeneral');
    }


    /**
     *  Crea un nuevo intervalo del horario general de tiempo al funcionario y lo relaciona con los dias
     * seleccionados en el formulario.
     *
     * @author Edwin Sandoval
     * @return Integer $cont_dias variable que nos conto el numero de dias que fueron seleccionado en el formulario
     * @param Request $request variabe con los datos del formulario
     */
    private function crearIntervalosPorNDias(Request $request){

        $cont_dias = 0; //variable para saber si se selecciono un dia al menos

        //for que toma los dias selecionados en el formulario, cada uno indentificado por los id 10001(lunes) a 10008(domingo) respectivamente
        // si fue selecciondo crea el intervalo general
        for ($i = 10001; $i<10008; $i++){
            if($request[$i]!=null) {
                $cont_dias++;
                //guardo el intervalo general de tiempo desde hasta y el dia
                Horariogeneral::create([
                    'desde'=> $request->desde_hora.":".$request->desde_minuto.":0",
                    'hasta'=> $request->hasta_hora.":".$request->hasta_minuto.":0",
                    'dia'=> $request->$i,
                ]);
            }
        }

        return $cont_dias;
    }

}
