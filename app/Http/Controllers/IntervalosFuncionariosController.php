<?php

namespace App\Http\Controllers;

use App\Intervaloinvitado;
use App\IntervalofuncionarioPuerta;
use App\Puerta;
use App\IntervaloInvitadoPuerta;
use App\Intervalofuncionario;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

class IntervalosFuncionariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarFuncionariosMiddleware');
    }

    /**
     * llama a la vista create de intervalos_funcionarios
     * con el formulario para crear un intervalo de horario especial.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de intervalos_funcionarios
     * y le paso
     * @param int $funcionario_id id del funcionario al que pertenece
     * @param int $puertasNormales una coleccion con todas las puestas normales
     * @param int $puertasEspeciales una coleccion con todas las puertas especiales
     * @param integer $funcionario_id id del funcionario al que va pertenecer el horario especial
     */
    public function create($funcionario_id)
    {
        //creo una coleccion con todas las puertas especiales
        $puertasEspeciales = User::find(Auth::User()->id)->puertas->where('puerta_especial',1);
        //creo una coleccion con todas las puestas normales
        $puertasNormales = User::find(Auth::User()->id)->puertas->where('puerta_especial',0);

        return view('intervalos_funcionarios.create',['funcionario_id'=>$funcionario_id,'puertasNormales'=>$puertasNormales,'puertasEspeciales'=>$puertasEspeciales]);
    }

    /**
     * Crea un nuevo intervalo de horario especial con los datos que recibe del formulario
     * y lo asocia al funcionario relacionando el $funcionario_id que llega como parametro
     * Tambien relaciono el intervalo de horario especial que se crea con todas las puertas selecionadas
     * agrupandolo por dias.
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response redirecciona a la vista horario del funcionario a la que pertenece el intervalo de horario especial
     * @param Request $request con los datos del formulario
     * @param integer $funcionario_id id del funcionario al que va pertenecer el intervalo de horario especia
     */
    public function store(Request $request,$funcionario_id)
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
            return redirect('IntervalosFuncionarios/create/'.$funcionario_id)->with(['message'=>'Intervalo de tiempo invalido','tipo'=>'error']);
        }

        try{
            DB::beginTransaction();
                //for que toma los dias selecionados en el formulario, cada uno indentificado por los id 10001(lunes) a 10008(domingo) respectivamente
                // si fue selecciondo crea el intervalo especial
                for ($i = 10001; $i<10008; $i++){
                    if($request[$i]!=null) {
                        $dias_validos = true;
                        //obtengo todos los intervalos del funcionario
                        $intervalos_generales_del_dia = DB::table('IntervalosFuncionarios')
                                                            ->select('desde','hasta')
                                                            ->where([
                                                                ['dia','=',$request->$i],
                                                                ['funcionario_id','=',$funcionario_id],
                                                                ])->get();

                        //itero todos los inertvalos y valido que el nuevo no se cruce con alguno de ellos
                        foreach ($intervalos_generales_del_dia as $intervalo_general_del_dia){

                            $nuevo_intervalo_desde = Carbon::createFromFormat('H:i:s', $request->desde_hora.':'.$request->desde_minuto.':00');
                            $actual_intervalo_hasta = Carbon::createFromFormat('H:i:s', $intervalo_general_del_dia->hasta);

                            $nuevo_intervalo_hasta = Carbon::createFromFormat('H:i:s', $request->hasta_hora.':'.$request->hasta_minuto.':00');
                            $actual_intervalo_desde = Carbon::createFromFormat('H:i:s', $intervalo_general_del_dia->desde);

                            $hora_valida_por_abajo = $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) * $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_hasta,false );
                            $hora_valida_por_arriba = $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) * $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_desde,false );
                            $hora_valida_por_centro = ($nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) + $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_hasta,false ) ) * ( $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) + $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_desde,false ));
                            //valido que el intervalo no se cruce con alguno ya registrado
                            if ( !($hora_valida_por_abajo > 0 && $hora_valida_por_arriba > 0 && $hora_valida_por_centro > 0 ) || $nuevo_intervalo_desde->diffInMinutes($actual_intervalo_desde,false ) == 0 || $nuevo_intervalo_hasta->diffInMinutes($actual_intervalo_hasta,false ) == 0){
                                return redirect('IntervalosFuncionarios/create/'.$funcionario_id)->with(['message'=>'La hora se cruza con otro intervalo ','tipo'=>'error']);
                            }
                        }

                        //guardo en el intervalo de tiempo desde, hasta y dia
                        Intervalofuncionario::create([
                                            'desde'=> $request->desde_hora.":".$request->desde_minuto.":0",
                                            'hasta'=> $request->hasta_hora.":".$request->hasta_minuto.":0",
                                            'dia'=> $request->$i,
                                            'funcionario_id'=> $funcionario_id,
                                        ]);

                        //obtengo el intervalo que se acabo de crear para asignarle las puertas y le resto un minuto a created_at para evitar
                        //conflictos con los siguientes intervalos que se van a crear
                        $intervalo_funcionario = DB::table('IntervalosFuncionarios')->orderBy('created_at', 'desc')->first();
                        DB::table('IntervalosFuncionarios')
                            ->where('id', $intervalo_funcionario->id)
                            ->update(['created_at'=>Carbon::now()->subMinute()->toDateTimeString()]);

                        //Relaciono el intervalo que se acabo de crear con todas las puertas selecionadas en el formulario
                        $todasPuertas = Puerta::all();
                        foreach($todasPuertas as $puerta){
                            //Si la puerta fue seclecionada en el check se guarda en la relacion secionn-puerta con un 1
                            // indicando que esta seccion tiene permiso sobre ella

                            if($request[$puerta->id]!=null) {
                                IntervalofuncionarioPuerta::create([
                                                                'intervalo_funcionario_id' => $intervalo_funcionario->id,
                                                                'puerta_id' => $puerta->id,
                                                            ]);
                            }
                        }

                    }
                DB::commit();
            }

        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('IntervalosFuncionarios/create/'.$funcionario_id)->with(['message'=>'Error Inesperado al realizar el registro','tipo'=>'error']);
        }
        if(!$dias_validos){
            return redirect('IntervalosFuncionarios/create/'.$funcionario_id)->with(['message'=>'Seleccione al menos un dia','tipo'=>'error']);
        }
        return redirect('/funcionarios/horario/'.$funcionario_id)->with(['message'=>'El intervalo se ha registrado correctamente','tipo'=>'message']);
    }

    /**
     *  llama a la vista show de intervalos_funcionarios la cual muestra la informacion relacionada a un horario especial de un funcionario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de los intervalos
     * y le paso
     * @param int $intervaloEspecial objeto del intervalo de horario especial que se quiere mostrar
     * @param int $puertasNormales una coleccion con todas las puestas normales asociadas al intervalo
     * @param int $puertasEspeciales una coleccion con todas las puertas especiales normales asociadas al intervalo de horario especial
     * @param integer $id id del intervalo de horario especial que se va a mostrar
     */
    public function show($id)
    {
        $intervaloEspecial = Intervalofuncionario::find($id);
        $intervaloEspecial->dias = DB::table('IntervalosFuncionarios')
            ->select('dia')
            ->where([
            ['desde','=',$intervaloEspecial->desde],
            ['funcionario_id','=',$intervaloEspecial->funcionario_id],
            ])->get();
        $puertasNormales = Intervalofuncionario::find($id)
                                                    ->puertas()
                                                    ->where('puerta_especial',0)
                                                    ->get();
        $puertasEspeciales = Intervalofuncionario::find($id)
                                                    ->puertas()
                                                    ->where('puerta_especial',1)
                                                    ->get();

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
        try{
            DB::beginTransaction();

            $intervaloActual = Intervalofuncionario::find($id);
            $funcionario_id = $intervaloActual->funcionario_id;
            $intervalos = DB::table('IntervalosFuncionarios')
                ->where([
                    ['desde','=',$intervaloActual->desde],
                    ['funcionario_id','=',$intervaloActual->funcionario_id],
                ])->get();

            foreach ($intervalos as $intervalo){
                $Intervalos_funcionarios_puertas = IntervalofuncionarioPuerta::all()->where('intervalo_funcionario_id',$intervalo->id);

                foreach($Intervalos_funcionarios_puertas as $Intervalo_funcionario_puerta){
                    $Intervalo_funcionario_puerta->delete();
                }
                Intervalofuncionario::destroy($intervalo->id);
            }
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('/funcionarios/horario/'.$funcionario_id)->with(['message'=>'Error al eliminar los intervalos','tipo'=>'error']);
        }
        DB::commit();
        return redirect('/funcionarios/horario/'.$funcionario_id)->with(['message'=>'El intervalo se ha eliminado correctamente','tipo'=>'message']);
    }
}
