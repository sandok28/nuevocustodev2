<?php

namespace App\Http\Controllers;

use App\Horariogeneral;
use App\Puerta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Invitado;
use Illuminate\Validation\Rules\In;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class HorariosGeneralesController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarHorarioGeneralMiddleware');
    }


    //comentar todo esto otra vez


    /**
     * Muestra la vista principal del index en HorariosGenerales
     * y envia la informacion necesaria para la visualizacion de
     * la informacion en tres variables dos para el tipo de puerta
     * y en intervaloshorariogeneral.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de Horarios generales
     * y le paso
     * $intervalosHorarioGeneral una coleccion con todos los intervalos generales que existen
     * $puertasNormales una coleccion con todas las puestas normales que tengan el campo estatus_en_horario_general en 1
     * $puertasEspeciales una coleccion con todas las puertas especiales que tengan el campo estatus_en_horario_general en 1
     * @param integer $seccion_id id del invitado al que va pertenecer el invitado
     */

    public function index()
    {
        $puertasNormales = DB::table('Puertas')
                                ->select('id','nombre','estatus_en_horario_general')
                                ->where('puerta_especial',0)
                                ->get();
        $puertasEspeciales = DB::table('Puertas')
                                ->select('id','nombre','estatus_en_horario_general')
                                ->where('puerta_especial',1)
                                ->get();

        $intervalosHorarioGeneral = DB::table('HorariosGenerales')->orderBy('desde', 'desc')->get();

        $intervalosHorarioGeneralAgrupados = DB::table('HorariosGenerales')->select('desde','hasta',DB::raw('count(*) as total'))->groupBy('desde','hasta')->get();

        foreach ($intervalosHorarioGeneralAgrupados as $intervaloHorarioGeneralAgrupado){
            $intervaloHorarioGeneralAgrupado->dias = DB::table('HorariosGenerales')->select('id','dia')->where('desde',$intervaloHorarioGeneralAgrupado->desde)->get();
        }
        return view('horarios_generales.index',['puertasNormales'=>$puertasNormales,'puertasEspeciales'=>$puertasEspeciales,'intervalosHorarioGeneralAgrupados'=>$intervalosHorarioGeneralAgrupados]);
    }



    /**
     * llama a la vista create de los horarios generales y
     * pasa la informacion necesaria solicitada por el usuario.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de de los horarios_generales
     */
    public function show()
    {
        $puertasNormales = DB::table('Puertas')
                                ->select('id','nombre','estatus_en_horario_general')
                                ->where('puerta_especial',0)->get();

        $puertasEspeciales = DB::table('Puertas')
                                ->select('id','nombre','estatus_en_horario_general')
                                ->where('puerta_especial',1)->get();
        $intervalosHorarioGeneralAgrupados = DB::table('HorariosGenerales')->select('desde','hasta',DB::raw('count(*) as total'))->groupBy('desde','hasta')->get();

        foreach ($intervalosHorarioGeneralAgrupados as $intervaloHorarioGeneralAgrupado){
            $intervaloHorarioGeneralAgrupado->dias = DB::table('HorariosGenerales')->select('dia')->where('desde',$intervaloHorarioGeneralAgrupado->desde)->get();
        }



        return view('horarios_generales.show',['puertasNormales'=>$puertasNormales,'puertasEspeciales'=>$puertasEspeciales,'intervalosHorarioGeneralAgrupados'=>$intervalosHorarioGeneralAgrupados]);

    }

    /**
     * llama a la vista create de los horarios generales
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
     *  Valida que todos los datos sean validos ademas de validar si el intervalo no se cruza con algun otro ya registrado
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciona a la vista index de los horarios generales
     * @param Request $request variable con los datos del formulario
     */
    public function store(Request $request)
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
            return redirect('horariogeneral/create')->with(['message'=>'Intervalo de tiempo invalido','tipo'=>'error']);
        }

        try{
            DB::beginTransaction();
            //for que toma los dias selecionados en el formulario, cada uno indentificado por los id 10001(lunes) a 10008(domingo) respectivamente
            // si fue selecciondo crea el intervalo general
            for ($i = 10001; $i<10008; $i++){
                if($request[$i]!=null) {
                    $dias_validos = true;
                    //guardo el intervalo general de tiempo desde hasta y el dia

                    $intervalos_generales_del_dia = DB::table('HorariosGenerales')
                                                        ->select('desde','hasta')
                                                        ->where('dia',$request->$i)->get();
                    foreach ($intervalos_generales_del_dia as $intervalo_general_del_dia){



                        $nuevo_intervalo_desde = Carbon::createFromFormat('H:i:s', $request->desde_hora.':'.$request->desde_minuto.':00');
                        $actual_intervalo_hasta = Carbon::createFromFormat('H:i:s', $intervalo_general_del_dia->hasta);

                        $nuevo_intervalo_hasta = Carbon::createFromFormat('H:i:s', $request->hasta_hora.':'.$request->hasta_minuto.':00');
                        $actual_intervalo_desde = Carbon::createFromFormat('H:i:s', $intervalo_general_del_dia->desde);

                        $hora_valida_por_abajo = $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) * $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_hasta,false );
                        $hora_valida_por_arriba = $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) * $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_desde,false );
                        $hora_valida_por_centro = ($nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) + $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_hasta,false ) ) * ( $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) + $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_desde,false ));
                        if ( !($hora_valida_por_abajo > 0 && $hora_valida_por_arriba > 0 && $hora_valida_por_centro > 0 ) || $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) == 0 || $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) == 0){
                            return redirect('horariogeneral/create')->with(['message'=>'La hora se cruza con otro intervalo ','tipo'=>'error']);
                        }
                    }

                   Horariogeneral::create([
                            'desde'=> $request->desde_hora.":".$request->desde_minuto.":0",
                            'hasta'=> $request->hasta_hora.":".$request->hasta_minuto.":0",
                            'dia'=> $request->$i,
                        ]);
                }
            }

        }
        catch (\Exception $ex){
            DB::rollback();
           return redirect('horariogeneral/create')->with(['message'=>'Error Inesperado al realizar el registro','tipo'=>'error']);
        }
        if(!$dias_validos){
            return redirect('horariogeneral/create')->with(['message'=>'Seleccione al menos un dia','tipo'=>'error']);
        }
        DB::commit();
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
        try{
            DB::beginTransaction();
            $Intervalos = Horariogeneral::find($id);

            DB::table('HorariosGenerales')->where([
                                                    ['desde', '=', $Intervalos->desde],
                                                    ['hasta', '=', $Intervalos->hasta],
                                                  ])->delete();
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('horariogeneral')->with(['message'=>'Error al eliminar los intervalos','tipo'=>'error']);
        }

        DB::commit();
        //devuelve la vista edit de los intervalos_invitados
        return redirect('/horariogeneral');
    }


    /**
     * Actualiza el estado de el campo estatus_en_horario_general de todos las puertas
     * poniendo en 1 el campo estatus_en_horario_general de las puertas que fueron seleccionadas
     * y en 0 las que no
     *
     * @author Edwin Sandoval
     *
     * @return \Illuminate\Http\Response devuelve la vista index de de los horarios_generales
     * @param Request $request variable con los datos del formulario
     */

    public function actualizarPuertas(Request $request)
    {
        try{
            DB::beginTransaction();
                $puertas = DB::table('Puertas')->select('id')->get();
                foreach ($puertas as $puerta){
                    if($request[$puerta->id]!= null){
                        Puerta::find($puerta->id)
                            ->update(['estatus_en_horario_general' => 1]);
                    }
                    else{
                        Puerta::find($puerta->id)
                            ->update(['estatus_en_horario_general' => 0]);
                    }
                }
            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('horariogeneral/')->with(['message'=>'Error Inesperado al realizar el registro','tipo'=>'error']);
        }
        return redirect('/horariogeneral')->with(['message'=>'El intervalo general se ha registrado correctamente','tipo'=>'message']);
    }


}
