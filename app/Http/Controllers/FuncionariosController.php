<?php

namespace App\Http\Controllers;
/**
 *Librerias necesarias para ejecutar las funciones
 *que la aplicacion va a necesitar.
 * */
use App\Cargo;
use App\Horariogeneral;
use App\Funcionario;
use App\Http\Requests\FuncionariosActualizarRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Yajra\Datatables\Datatables;
use Mockery\Exception;


class FuncionariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarFuncionariosMiddleware');
    }

    /**
     * Display a listing of the resource.
     *
     * por medio de la funcion compact a la vista asi permitiendo usar los
     * datos del modelo que se encuentran el la base de datos.
     */


    public function index()
    {
        $this->actualizar_estado_licencias();
        $funcionarios=Funcionario::all();
        return view('funcionarios.index',compact('funcionarios'));

    }

    /**
     * La funcion crear me genera la variable $cargo con los datos
     * del modelo Cargo que se encuentra en la base de datos devolviendo una vista
     * de crear.blade.php con los datos del modelo.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cargos_array = DB::table('cargos')
                            ->select('id','nombre')
                            ->where('estatus',1)
                            ->get()
                            ->pluck('nombre','id');
        return view('funcionarios.create',compact('cargos_array'));
    }

    /**
     * Recibe los parametros de la vista create.blade del formulario en funcionarios
     * por medio de request y los almacena en la base de datos por medio del modelo
     * Funcionario con la funcion create.
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(\App\Http\Requests\FuncionariosCrearRequest $request)
    {

        try{
            DB::beginTransaction();

                DB::table('funcionarios')
                    ->insert([
                            'nombre'=>$request->nombre,
                            'apellido'=>$request->apellido,
                            'cedula'=>$request->cedula,
                            'correo'=>$request->correo,
                            'tarjeta_rfid'=>$request->tarjeta_rfid,
                            'fecha_nacimiento'=>$request->fecha_nacimiento,
                            'cargo_id'=>$request->cargo_id,
                            'estatus_licencia'=>'0',
                            'foto'=>$request->fotocreada,
                            'celular'=>$request->celular,
                            'horario_normal'=>$request->horario_normal,
                            'licencia'=>'0',
                            'estatus'=>'1',//ojo con esto, ese campo es dado de baja donde 0 es inactivo
                            'created_at'=>Carbon::now(),
                    ]);
                $funcionario = DB::table('funcionarios')
                                    ->select('id')
                                    ->orderBy('created_at', 'desc')
                                    ->first();

                $llaves = DB::table('llaves')
                                    ->where([
                                        ['llave_rfid','=', $request->tarjeta_rfid],
                                        ['fecha_expiracion','>', Carbon::now()->toDateString()]//me trae las activas
                                    ])->get();


                foreach ($llaves as $llave){
                    if ($llave->id_asociado != $funcionario->id){
                        return redirect('/funcionarios/create')->with(['message'=>'Llave RFID ya esta en uso','tipo'=>'error']);
                    }
                }

                DB::table('llaves')
                        ->insert([
                            'tipo'=> '0',//tipo 0 es el indicativo de funcionario
                            'llave_rfid' => $request->tarjeta_rfid,
                            'id_asociado' => $funcionario->id,
                            'fecha_expiracion' => Carbon::now()->addYears(10)->toDateString(),
                        ]);
            DB::commit();
            return redirect('/funcionarios')->with(['message'=>'El Usuario se ha registrado correctamente','tipo'=>'message']);
        }
        catch (\Exception $ex){
            dd($ex);
            return redirect('/funcionarios/create')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
    }
    /**
     * Display the specified resource.
     *El recurso no es utilizado para este proyecto
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        return view('funcionarios.edit',['funcionario'=>$funcionario]);
    }

    /**
     * Edita un funcionario especifico que envia desde el index de funcionario.
     *
     * Genera dos variables cargos y funcionarios para enviar a la vista editar
     * y tener todos los datos correspondientes al id a editar.
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargos_array = DB::table('cargos')
                            ->select('id','nombre')
                            ->where('estatus',1)
                            ->get()
                            ->pluck('nombre','id');
        $funcionario = Funcionario::find($id);
        return view('funcionarios.edit',['funcionario'=>$funcionario,'cargos_array'=>$cargos_array]);
    }

    /**
     * Update the specified resource in storage.
     * Modificando y Guardando la ultima configuracion que genera
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionariosActualizarRequest $request, $id)
    {

        try{
            DB::beginTransaction();
            $llaves = DB::table('llaves')
                    ->where([
                        ['llave_rfid','=', $request->tarjeta_rfid],
                        ['fecha_expiracion','>', Carbon::now()->toDateString()]//me trae las activas
                    ])->get();

            foreach ($llaves as $llave){
                if ($llave->id_asociado != $id){
                    return redirect('/funcionarios/'.$id.'/edit')->with(['message'=>'Llave RFID ya esta en uso','tipo'=>'error']);
                }
            }

            DB::table('funcionarios')
                ->where('id',$id)
                ->update(
                    [
                        'nombre'=>$request->nombre,
                        'apellido'=>$request->apellido,
                        'cedula'=>$request->cedula,
                        'correo'=>$request->correo,
                        'tarjeta_rfid'=>$request->tarjeta_rfid,
                        'fecha_nacimiento'=>$request->fecha_nacimiento,
                        'cargo_id'=>$request->cargo_id,
                        'estatus_licencia'=>'0',
                        'foto'=>$request->fotocreada,
                        'celular'=>$request->celular,
                        'horario_normal'=>$request->horario_normal,
                        'licencia'=>'0',
                        'estatus'=>$request->estatus,//ojo con esto, ese campo es dado de baja 0 es inactivo
                    ]
                );

            DB::table('llaves')
                    ->where([
                        ['id_asociado','=', $id],
                        ['fecha_expiracion','>', Carbon::now()->toDateString()]//me trae las activas
                    ])
                    ->update([
                        'fecha_expiracion' => Carbon::now()->subDay(1)->toDateString(),
                    ]);
            DB::table('llaves')
                    ->insert([
                        'tipo'=> '0',//tipo 0 es el indicativo de funcionario
                        'llave_rfid' => $request->tarjeta_rfid,
                        'id_asociado' => $id,
                        'fecha_expiracion' => Carbon::now()->addYears(10)->toDateString(),
                    ]);
            DB::commit();

        }
        catch (\Exception $ex){
            return redirect('/funcionarios/'+$id+'/edit')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        return redirect('/funcionarios')->with(['message'=>'El Usuario se ha Actualizado correctamente','tipo'=>'message']);
    }


    /**
     * No hace nada en concreto solo muestra la vista horario de funcionarios en donde se puede visualizar
     * el horario que tiene el funcionario actualmente Existen 3 tipos:
     * -horario de acuerdo a la empresa
     * -Horario propio especial
     * -Horario deacuerdo al cargo
     * Dependiendo de cual sea redirecciona a caada una de las vistas necesrias
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista horario de funcionarios
     * y le paso
     * $funcionario objeto del funcionario al que pertenece el id
     * $horariosEspeciales una coleccion con todas las puestas normales
     * $puertasEspeciales una coleccion con todas las puertas especiales
     * @param integer $funcionario_id id del funcionario al que pertenece el horario
     */
    public function horario($funcionario_id)
    {

       $funcionario = Funcionario::find($funcionario_id);



       if($funcionario->horario_normal == 0 ){

           $puertasNormales = DB::table('Puertas')
                                   ->select('id','nombre','estatus_en_horario_general')
                                   ->where('puerta_especial',0)->get();
           $puertasEspeciales = DB::table('Puertas')
                                   ->select('id','nombre','estatus_en_horario_general')
                                   ->where('puerta_especial',1)->get();
           $intervalosHorarioGeneral = Horariogeneral::all();
           // redirecciona a la vista horario de funcionario y carga el horario general de la empresa
           return view('funcionarios.horario',['funcionario'=>$funcionario,'puertasNormales'=>$puertasNormales,'puertasEspeciales'=>$puertasEspeciales,'intervalosHorarioGeneral'=>$intervalosHorarioGeneral]);

       }
       if($funcionario->horario_normal == 1 ){
            $horariosEspeciales = $funcionario->horariosEspeciales;
           // redirecciona a la vista horario de funcionario y carga el horario especial del funcionario
            return view('funcionarios.horario',['funcionario'=>$funcionario,'horariosEspeciales'=>$horariosEspeciales]);
       }
        if($funcionario->horario_normal == 2 ){
            // redirecciona a la vista horario de funcionario y carga el horario  de cada seccion asociada al cargo del funcionario
            return view('funcionarios.horario',['funcionario'=>$funcionario]);
        }

        $horariosEspeciales = $funcionario->horariosEspeciales;

        return view('funcionarios.horario',['funcionario'=>$funcionario,'horariosEspeciales'=>$horariosEspeciales]);
    }


    /**
     * Actualiza el estado de la licencia de todos los funcionarios este metodo esta diseñado
     * para que sea activado una vez cada noche en el servidor actualmente se ejecuta cada vez
     * que se ingresa a la vista index de funcionarios
     *
     * @author Edwin Sandoval
     */



    private function actualizar_estado_licencias(){

        $funcionarios=Funcionario::all();

        try {
            DB::beginTransaction();
                DB::table('Funcionarios')->update(['licencia' =>'0']);
                foreach ($funcionarios as $funcionario) {
                    //obtengo una coleccion con todas las licencias activas
                    $funcionario_licenciasActivas=$funcionario->licencias->where('estatus',1);

                    foreach ($funcionario_licenciasActivas as $funcionario_licenciaActiva) {
                        $desde = Carbon::createFromFormat('Y-m-d', $funcionario_licenciaActiva->desde);
                        $hasta = Carbon::createFromFormat('Y-m-d', $funcionario_licenciaActiva->hasta);
                        $hoy = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());

                        if ( $hoy->diffInDays($desde,false ) * $hoy->diffInDays($hasta,false ) <= 0 ) {
                            DB::table('Funcionarios')->where('id', $funcionario->id)->update(['licencia' =>'1']);
                        }
                    }


                }
            DB::commit();
        } catch (\Exception $ex){
        }
    }

    public  function listar()
    {
            $Funcionarios= \App\Funcionario::select(['id','nombre','apellido','cedula','correo','tarjeta_rfid','licencia']);
            return \Datatables::of($Funcionarios)
                ->addColumn('action', function ($Funcionario) {
                    $aciones ="";

                    if ($Funcionario->licencia==0)
                    {
                        $aciones ="<div class='btn btn-group'>";
                        $aciones =$aciones.'<a href="/funcionarios/'.$Funcionario->id.'/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                        $aciones = $aciones.'<a href="/funcionarios/horario/'.$Funcionario->id.'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Horario</a>';
                        $aciones = $aciones.'<a href="licencias/create/" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Licencias</a>';
                        $aciones =$aciones."</div>";

                    }else
                    {
                        $aciones ="<div class='btn btn-group'>";
                        $aciones = $aciones.'<a href="/funcionarios/'.$Funcionario->id.'/edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                        $aciones = $aciones.'<a href="/funcionarios/horario/'.$Funcionario->id.'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Horario</a>';
                        $aciones = $aciones.'<a href="licencias/create/'.$Funcionario->id.'" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Licencias</a>';
                        $aciones =$aciones."</div>";
                    }
                    return $aciones;
                })
                ->make(true);
    }
}
