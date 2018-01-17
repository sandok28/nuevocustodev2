<?php

namespace App\Http\Controllers;

use App\IntervaloSeccion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IntervalosSeccionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarSeccionesMiddleware');
    }

    /**
     * No hace nada en concreto solo llama a la vista create intervalos_secciones
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de intervalos_secciones
     * y le paso
     * $seccion_id id de la seccion a la que pertenece el intervalo
     * @param integer $seccion_id id de la seccion  a la que va pertenecer el intervalo
     */
    public function create($seccion_id)
    {

        return view('intervalos_secciones.create',['seccion_id'=>$seccion_id]);
    }

    /**
     * Crea un nuevo intervalo con los datos que recibe del formulario
     * y lo asocia a la seccion relacionada al valor de $seccion_id que llega como parametro
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciona a la vista edit del secciones a la que pertenece el intervalo
     * @param Request $request con los datos del formulario
     * @param integer $seccion_id id del invitado al que va pertenecer el intervalo
     */
    public function store(Request $request,$seccion_id)
    {

        if($request->hasta_minuto < 10 ){
            $request->hasta_minuto = '0'.$request->hasta_minuto;
        }
        if($request->desde_minuto < 10 ){
            $request->desde_minuto = '0'.$request->desde_minuto;
        }

        $dias_validos = false;
        $tiempo_valido = true;
        if ($request->hasta_hora < $request->desde_hora) {
            $tiempo_valido = false;
        }
        else if($request->hasta_hora == $request->desde_hora && $request->hasta_minuto < $request->desde_minuto){
            $tiempo_valido = false;
        }
        if(!$tiempo_valido){
            return redirect('IntervalosSecciones/create/'.$seccion_id)->with(['message'=>'Intervalo de tiempo invalido','tipo'=>'error']);
        }

        try{
            DB::beginTransaction();
            //for que toma los dias selecionados en el formulario, cada uno indentificado por los id 10001(lunes) a 10008(domingo) respectivamente
            // si fue selecciondo crea el intervalo general
            for ($i = 10001; $i<10008; $i++){
                if($request[$i]!=null) {
                    $dias_validos = true;
                    //guardo el intervalo general de tiempo desde hasta y el dia

                    $intervalos_secciones_del_dia = DB::table('IntervalosSecciones')
                        ->select('desde','hasta')
                        ->where([
                            ['dia', '=', $request->$i],
                            ['seccion_id', '=', $seccion_id]
                            ])->get();


                    foreach ($intervalos_secciones_del_dia as $intervalo_seccion_del_dia){



                        $nuevo_intervalo_desde = Carbon::createFromFormat('H:i:s', $request->desde_hora.':'.$request->desde_minuto.':00');
                        $actual_intervalo_hasta = Carbon::createFromFormat('H:i:s', $intervalo_seccion_del_dia->hasta);

                        $nuevo_intervalo_hasta = Carbon::createFromFormat('H:i:s', $request->hasta_hora.':'.$request->hasta_minuto.':00');
                        $actual_intervalo_desde = Carbon::createFromFormat('H:i:s', $intervalo_seccion_del_dia->desde);

                        $hora_valida_por_abajo = $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) * $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_hasta,false );
                        $hora_valida_por_arriba = $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) * $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_desde,false );
                        $hora_valida_por_centro = ($nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) + $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_hasta,false ) ) * ( $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) + $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_desde,false ));
                        if ( !($hora_valida_por_abajo > 0 && $hora_valida_por_arriba > 0 && $hora_valida_por_centro > 0 ) || $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) == 0 || $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) == 0){
                            return redirect('IntervalosSecciones/create/'.$seccion_id)->with(['message'=>'La hora se cruza con otro intervalo ','tipo'=>'error']);
                        }
                    }

                    IntervaloSeccion::create([
                            'desde'=> $request->desde_hora.":".$request->desde_minuto.":0",
                            'hasta'=> $request->hasta_hora.":".$request->hasta_minuto.":0",
                            'dia'=> $request->$i,
                            'seccion_id' => $seccion_id,
                        ]);
                }
            }

        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('IntervalosSecciones/create/'.$seccion_id)->with(['message'=>'Error Inesperado al realizar el registro','tipo'=>'error']);
        }
        if(!$dias_validos){
            return redirect('IntervalosSecciones/create/'.$seccion_id)->with(['message'=>'Seleccione al menos un dia','tipo'=>'error']);
        }
        DB::commit();
        return redirect('/secciones/'.$seccion_id.'/edit')->with(['message'=>'El intervalo general se ha registrado correctamente','tipo'=>'message']);
    }


    /**
     *  Elimina un intervalo asociado al $id que llega como parametro
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de los invitados
     * @param integer $seccion_id id del intervalo que se va a eliminar
     */
    public function destroy($id,$seccion_id)
    {
        try{




            $intervalo = IntervaloSeccion::find($id);

            $intervalosSecciones = IntervaloSeccion::where([
                    ['desde','=',$intervalo->desde],
                    ['seccion_id','=',$seccion_id]
                ])->get();

            foreach ($intervalosSecciones as $intervalosSeccion){
                $intervalosSeccion->delete();
            }

            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('/secciones/'.$seccion_id.'/edit')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        //devuelve la vista edit de los intervalos_invitados
        return redirect('/secciones/'.$seccion_id.'/edit')->with(['message'=>'Intervalo eliminado correctamente','tipo'=>'message']);
    }

}
