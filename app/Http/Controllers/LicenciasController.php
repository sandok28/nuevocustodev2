<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Licencia;
use App\Funcionario;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
class LicenciasController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarLicenciasMiddleware');
    }

    /**
     * Llama a la vista index donde se listan todos las licencias
     * valida que estas estan activas o no
     *
     * @author Edwin_Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de licencias
     * y le paso
     * $licenciasActivas coleccion con todas las licencias activas
     * $licenciasConcluidas coleccion con todas las licencias concluidas
     */
    public function index()
    {
        $this->actualizarEstatusLicencias();
        //obtengo una coleccion con todas las licencias activas
        $licenciasActivas=Licencia::all()->where('estatus',1);

        //obtengo una coleccion con todas las licencias concluidas
        $licenciasConcluidas=Licencia::all()->where('estatus',0);


        //itero $licenciasActivas para agregar 2 atributos mas a cada una de las licencias activas
        //$licenciaActiva->vigencia la cual guarda los dias totales que dura la licencia
        //$licenciaActiva->restante la cual guarda los dias que restan para que termine licencia
        foreach($licenciasActivas as $licenciaActiva){

            $hasta = Carbon::createFromFormat('Y-m-d', $licenciaActiva->hasta);
            $desde = Carbon::createFromFormat('Y-m-d', $licenciaActiva->desde);
            $licenciaActiva->vigencia = $desde->diffInDays($hasta, false);

            $hoy = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
            $licenciaActiva->restante = $hoy->diffInDays($hasta, false);

            //si la vigencia es menor a los dias restantes entonces la vigencia es igual a los dias restantes
            if ($licenciaActiva->vigencia < $licenciaActiva->restante){
                $licenciaActiva->restante = $licenciaActiva->vigencia;
            }


            if ( $hoy->diffInDays($desde,false ) * $hoy->diffInDays($hasta,false ) <= 0 ) {
                $licenciaActiva->en_curso = 1;
            }
            else{
                $licenciaActiva->en_curso = 0;
            }
        }
        //itero $licenciasConcluidas para agregar un atributo mas a cada una de las licencias concluidad
        //$licenciaConcluida->vigencia la cual guarda los dias totales que dura la licencia
        foreach($licenciasConcluidas as $licenciaConcluida){
            $hasta = Carbon::createFromFormat('Y-m-d', $licenciaConcluida->hasta);
            $desde = Carbon::createFromFormat('Y-m-d', $licenciaConcluida->desde);
            $licenciaConcluida->vigencia =  $desde->diffInDays($hasta,false);
        }

        return view('licencias.index',compact('licenciasActivas','licenciasConcluidas'));
    }



    /**
     * No hace nada en concreto solo llama a la vista create de licencias
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de licencias
     * @param integer $funcionario_id id del funcionario al que va pertenercer la licencia
     */
    public function create($funcionario_id)
    {

        $funcionario = DB::table('Funcionarios')
                            ->where('id',$funcionario_id)
                            ->first();
        $funcionario->cargo =  DB::table('Cargos')
                                    ->where('id',$funcionario->cargo_id)
                                    ->first();
        return view('licencias.create',compact('funcionario'));
    }

    /**
     * Crea una nueva licencia con los datos que recibe del formulario
     * y la relacionamos al funcionario por medio de $funcionario_id
     * por defecto asigna el estatus de la nueva licencia en 1 indicando que esta activa
     * tambien valida si la nueva licencia no se cruza con una anterior o postarior
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista index de licencias
     * @param Request $request con los datos del formulario
     * @param integer $funcionario_id id del funcionario  al que va pertenercer la licencia
     */
    public function store(Request $request, $funcionario_id)
    {


        $nueva_licencia_hasta = Carbon::createFromFormat('Y-m-d', $request->hasta);
        $nueva_licencia_desde = Carbon::createFromFormat('Y-m-d', $request->desde);
        $hoy = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());

        if ($hoy->diffInDays($nueva_licencia_desde,false) <= 0 ){
            return redirect('licencias/create/'.$funcionario_id)->with(['message'=>'La fecha de inicio ya paso','tipo'=>'error']);
        }
        if ($nueva_licencia_desde->diffInDays($nueva_licencia_hasta,false) < 0 ){
            return redirect('licencias/create/'.$funcionario_id)->with(['message'=>'La fecha de hasta no puede ser menor que la fecha desde ','tipo'=>'error']);
        }


        try {
            DB::beginTransaction();
                //obtengo una coleccion con todas las licencias activas del funcionario asociado al $funcionario_id
                $licenciasActivas = DB::table('licencias')->where(['funcionario_id'=>$funcionario_id,'estatus'=>1])->get();

                foreach ($licenciasActivas as $licenciaActiva) {

                    $actual_licenciaActiva_hasta = Carbon::createFromFormat('Y-m-d', $licenciaActiva->hasta);
                    $actual_licenciaActiva_desde = Carbon::createFromFormat('Y-m-d', $licenciaActiva->desde);

                    $hora_valida_por_abajo = $nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) * $nueva_licencia_desde->diffInDays($actual_licenciaActiva_hasta,false );
                    $hora_valida_por_arriba = $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) * $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_desde,false );
                    $hora_valida_por_centro = ($nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) + $nueva_licencia_desde->diffInDays($actual_licenciaActiva_hasta,false ) ) * ( $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) + $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_desde,false ));
                    if ( !($hora_valida_por_abajo > 0 && $hora_valida_por_arriba > 0 && $hora_valida_por_centro > 0 ) || $nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) == 0 || $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) == 0){
                        return redirect('licencias/create/'.$funcionario_id)->with(['message'=>'La fecha se cruza con otra licencia activa ','tipo'=>'error']);
                    }

                    $hasta = Carbon::createFromFormat('Y-m-d', $licenciaActiva->hasta);
                    $hoy = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());

                    if ($hoy->diffInDays($hasta, false) < 0) {
                        DB::table('Licencias')->where('id', $licenciaActiva->id)->update(['estatus' =>'0']);
                    }
                }
                DB::table('Licencias')->insert([
                    'desde'=> $request->desde,
                    'hasta'=> $request->hasta,
                    'estatus' => 1,
                    'funcionario_id'=> $funcionario_id,
                ]);
            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            return redirect('licencias/create/'.$funcionario_id)->with(['message'=>'Algo salio mal ','tipo'=>'error']);
        }
        return redirect('/licencias')->with(['message'=>'La licencia se ha registrada correctamente','tipo'=>'message']);
    }

    /**
     * No hace nada en concreto solo llama a la vista edit de licencias
     * la cual tiene el formulario de licencias
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de licencias
     * y le paso
     * $licencia objeto de la licencia asociada al $id que llega por parametro.
     * @param integer $id id de la licencia a editar
     */
    public function edit($id)
    {
        $licencia = Licencia::find($id);
        $funcionario = $licencia->funcionario;
        return view('licencias.edit',['licencia'=>$licencia,'funcionario'=>$funcionario]);
    }

    /**
     * Actualiza la licencia asociada al $id con los datos que trae el $request
     *
     * @author Edwin Sandoval.
     * @return \Illuminate\Http\Response Redirecciono a la vita index de licencias.
     * @param Request $request con los datos del formulario.
     * @param integer $id id de la licencia que se quiere actualizar.
     */
    public function update(Request $request, $id)
    {
        $nueva_licencia_hasta = Carbon::createFromFormat('Y-m-d', $request->hasta);
        $nueva_licencia_desde = Carbon::createFromFormat('Y-m-d', $request->desde);
        $hoy = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());

        if ($hoy->diffInDays($nueva_licencia_desde,false) <= 0 ){
            return redirect('licencias/'.$id.'/edit')->with(['message'=>'La fecha de inicio ya paso','tipo'=>'error']);
        }
        if ($nueva_licencia_desde->diffInDays($nueva_licencia_hasta,false) < 0 ){
            return redirect('licencias/'.$id.'/edit')->with(['message'=>'La fecha de hasta no puede ser menor que la fecha desde ','tipo'=>'error']);
        }

        try {
            DB::beginTransaction();
                $funcionario = DB::table('Licencias')
                                        ->select('funcionario_id')
                                        ->where('id',$id)
                                        ->first();



                //obtengo una coleccion con todas las licencias activas del funcionario asociado al $funcionario_id
                $licenciasActivas = DB::table('licencias')
                    ->where([
                        ['funcionario_id','=',$funcionario->funcionario_id],
                        ['estatus','=',1],
                        ['id','!=',$id]
                    ])
                    ->get();

                foreach ($licenciasActivas as $licenciaActiva) {
                    $actual_licenciaActiva_hasta = Carbon::createFromFormat('Y-m-d', $licenciaActiva->hasta);
                    $actual_licenciaActiva_desde = Carbon::createFromFormat('Y-m-d', $licenciaActiva->desde);

                    $hora_valida_por_abajo = $nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) * $nueva_licencia_desde->diffInDays($actual_licenciaActiva_hasta,false );
                    $hora_valida_por_arriba = $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) * $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_desde,false );
                    $hora_valida_por_centro = ($nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) + $nueva_licencia_desde->diffInDays($actual_licenciaActiva_hasta,false ) ) * ( $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) + $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_desde,false ));
                    if ( !($hora_valida_por_abajo > 0 && $hora_valida_por_arriba > 0 && $hora_valida_por_centro > 0 ) || $nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) == 0 || $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) == 0){
                        return redirect('licencias/'.$id.'/edit')->with(['message'=>'La fecha se cruza con otra licencia activa ','tipo'=>'error']);
                    }

                }

                DB::table('Licencias')
                    ->where('id',$id)
                    ->update([
                        'desde'=> $request->desde,
                        'hasta'=> $request->hasta,
                    ]);

            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            dd($ex);
        }
        return redirect('/licencias')->with(['message'=>'La licencia  ha actualizado correctamente','tipo'=>'message']);
    }

    /**
     * No hace nada en concreto solo llama a la vista edit_en_curso de licencias
     * la cual tiene el formulario de licencias
     * este formulario solo tiene la fecha de terminacion de la licencia
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit_en_curso de licencia
     * y le paso
     * $licencia objeto de la licencia asociada al $id que llega por parametro.
     * @param integer $id id de la licencia a editar
     */

    public function editEnCurso($funcionario_id)
    {
        $licencia = Licencia::find($funcionario_id);
        $funcionario = $licencia->funcionario;
        return view('licencias.edit_en_curso',['licencia'=>$licencia,'funcionario'=>$funcionario]);
    }



    /**
     * Actualiza la licencia asociada al $id con los datos que trae el $request
     * Solo actualiza el atrbuto desde de una licencia que esta activa justo en ese momento
     *
     * @author Edwin Sandoval.
     * @return \Illuminate\Http\Response Redirecciono a la vita index de licencias.
     * @param Request $request con los datos del formulario.
     * @param integer $id id de la licencia que se quiere actualizar.
     */
    public function updateEnCurso(Request $request, $id)
    {


        $nueva_licencia_hasta = Carbon::createFromFormat('Y-m-d', $request->hasta);
        $hoy = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());

        if ($hoy->diffInDays($nueva_licencia_hasta,false) <= 0){
            return redirect('licencias/edit_en_curso/'.$id)->with(['message'=>'La fecha de hasta no puede ser anterior a hoy','tipo'=>'error']);
        }

        try {
            DB::beginTransaction();
                $funcionario = DB::table('Licencias')
                    ->select('funcionario_id')
                    ->where('id',$id)
                    ->first();



                //obtengo una coleccion con todas las licencias activas del funcionario asociado al $funcionario_id
                $licenciasActivas = DB::table('licencias')
                    ->where([
                        ['funcionario_id','=',$funcionario->funcionario_id],
                        ['estatus','=',1],
                        ['id','!=',$id]
                    ])
                    ->get();

                foreach ($licenciasActivas as $licenciaActiva) {


                    $nueva_licencia_desde = $hoy;
                    $actual_licenciaActiva_hasta = Carbon::createFromFormat('Y-m-d', $licenciaActiva->hasta);

                    $nueva_licencia_hasta = Carbon::createFromFormat('Y-m-d', $request->hasta);
                    $actual_licenciaActiva_desde = Carbon::createFromFormat('Y-m-d', $licenciaActiva->desde);

                    $hora_valida_por_abajo = $nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) * $nueva_licencia_desde->diffInDays($actual_licenciaActiva_hasta,false );
                    $hora_valida_por_arriba = $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) * $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_desde,false );
                    $hora_valida_por_centro = ($nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) + $nueva_licencia_desde->diffInDays($actual_licenciaActiva_hasta,false ) ) * ( $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) + $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_desde,false ));
                    if ( !($hora_valida_por_abajo > 0 && $hora_valida_por_arriba > 0 && $hora_valida_por_centro > 0 ) || $nueva_licencia_desde->diffInDays($actual_licenciaActiva_desde,false ) == 0 || $nueva_licencia_hasta->diffInDays($actual_licenciaActiva_hasta,false ) == 0){
                        return redirect('licencias/edit_en_curso/'.$id)->with(['message'=>'La fecha se cruza con otra licencia activa ','tipo'=>'error']);
                    }

                }

                DB::table('Licencias')
                    ->where('id',$id)
                    ->update([
                        'hasta'=> $request->hasta,
                    ]);

            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            dd($ex);
        }


        return redirect('/licencias')->with(['message'=>'La licencia  ha actualizado correctamente','tipo'=>'message']);
    }


    public function destroy($id)
    {
        try{
            DB::beginTransaction();
                DB::table('Licencias')
                    ->where('id',$id)
                    ->delete();
            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('/licencias')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        //devuelve la vista edit de los intervalos_invitados
        return redirect('/licencias')->with(['message'=>'La licencia  se ha eliminado correctamente','tipo'=>'message']);
    }

    public function destroyEnCurso($id)
    {
        try{
            DB::beginTransaction();
                DB::table('Licencias')
                    ->where('id',$id)
                    ->update([
                        'estatus'=>0,
                        'hasta'=> Carbon::now()->toDateString()
                    ]);
            DB::commit();
        }
        catch (\Exception $ex){
            DB::rollback();
            return redirect('/licencias')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        return redirect('/licencias')->with(['message'=>'La licencia  se ha concluido correctamente','tipo'=>'message']);
    }

    /**
     * Actualiza el estado de todas las licencias poniendo en estatus 0 si la fecha de la licencia caduci, este metodo esta diseñado
     * para que sea activado una vez cada noche en el servidor actualmente se ejecuta cada vez
     * que se ingresa a la vista index de licencias
     *
     * @author Edwin Sandoval
     */
    private function actualizarEstatusLicencias(){

        //obtengo una coleccion con todas las licencias activas
        $licenciasActivas=Licencia::all()->where('estatus',1);

        try {
            DB::beginTransaction();
                foreach ($licenciasActivas as $licenciaActiva) {
                    $hasta = Carbon::createFromFormat('Y-m-d', $licenciaActiva->hasta);
                    $hoy = Carbon::createFromFormat('Y-m-d', Carbon::now()->toDateString());
                    if ($hoy->diffInDays($hasta, false) < 0) {
                        DB::table('Licencias')->where('id', $licenciaActiva->id)->update(['estatus' =>'0']);
                    }
                }
            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            dd($ex);
        }
    }
}
