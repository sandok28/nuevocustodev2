<?php

namespace App\Http\Controllers;

use App\CargoSeccion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Cargo;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Mockery\Exception;
use App\Horariogeneral;
use App\Funcionario;
use App\Http\Requests\FuncionariosActualizarRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
class CargosController extends Controller
{
    public function __construct()
    {
        //$this->middleware('guest');
        //$this->middleware('GestionarCargosMiddleware');
    }


    /**
     * No hace nada en concreto solo llama a la vista index de Cargos
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de cargos y le paso una coleccion con todos los cargps
     */
    public function index()
    {
        return view('cargos.index');
    }

    public  function listar_cargos()
    {
        try{
            $cargos = Cargo::select(['id','nombre','estatus']);
            return Datatables::of($cargos)
                ->addColumn('action', function ($cargo)
                {
                    $aciones ="";
                    $aciones ="<div class='btn btn-group'>";
                    $aciones =$aciones.'<a href="'.route('cargos.edit',$cargo->id).'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                    $aciones =$aciones."</div>";
                    return $aciones;

                })->make(true);
        } catch (\Exception $ex){
            dd($ex);

    }

    }

    /**
     * No hace nada en concreto solo llama a la vista create
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista create de cargos y le paso una coleccion con todos las secciones
     */
    public function create()
    {
        $secciones = DB::table('Secciones')
                        ->select('id','nombre')
                        ->get();
        return view('cargos.create',['secciones'=>$secciones]);
    }

    /**
     * Crea un nuevo cargo con los datos que recibe del formulario
     * por defecto asigna el estatus del nuevo cargo en 1 indicando que esta activo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista index de cargos
     * @param Request $request con los datos del formulario de cargos
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|unique:Cargos|min:4',
        ]);

        try{
            DB::beginTransaction();

                Cargo::create([
                    'nombre'=> $request->nombre,
                    'estatus'=> '1',
                ]);

                $cargo = DB::table('cargos')
                    ->select('id')
                    ->orderBy('created_at', 'desc')
                    ->first();
                $secciones = DB::table('Secciones')
                    ->select('id')
                    ->get();

                foreach($secciones as $seccion){
                    //Si la seccion fue seclecionada en el check, se guarda en la relacion cargo-seciones con un 1
                    // indicando que esta seccion tiene permiso sobre el
                    if($request[$seccion->id]!=null) {
                        CargoSeccion::create([
                            'cargo_id'=> $cargo->id,
                            'seccion_id'=> $seccion->id,
                            'estatus_permiso'=>'1',
                        ]);

                    }
                    else{
                        CargoSeccion::create([
                            'cargo_id'=> $cargo->id,
                            'seccion_id'=> $seccion->id,
                            'estatus_permiso'=>'0',
                        ]);
                    }
                }
            DB::commit();
        } catch (\Exception $ex){
            DB::rollback();
            //dd($ex);
            return redirect('/cargos/create')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }
        return redirect('/cargos')->with(['message'=>'El cargo se ha registrado correctamente','tipo'=>'message']);
    }

    /**
     * Busca el cargo asociado al $id y lo guarda en la variable $cargo
     * luego llama a la vista edit
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista edit de cargos y le paso la variable $cargo
     * @param integer $id  id del cargo que se quiere editar
     */
    public function edit($id)
    {

        $cargo = Cargo::find($id);

        $secciones = DB::table('Cargos')
                            ->where('Cargos.id',$id)
                            ->join('Cargos_Secciones', 'cargos.id', '=', 'Cargos_Secciones.cargo_id')
                            ->join('Secciones', 'Secciones.id', '=', 'Cargos_Secciones.seccion_id')
                            ->select('Secciones.id', 'Secciones.nombre', 'Cargos_Secciones.estatus_permiso')
                            ->get();

        $num_funcionarios = DB::table('Cargos')
                            ->where('Cargos.id',$id)
                            ->join('Funcionarios', 'cargos.id', '=', 'Funcionarios.cargo_id')
                            ->where([
                                ['Funcionarios.horario_normal','=','2'],
                                ['Funcionarios.estatus','=','1'],

                            ])->count();



        return view('cargos.edit',['cargo'=>$cargo,'secciones'=>$secciones,'num_funcionarios'=>$num_funcionarios]);
    }

    /**
     * Busca el cargo asociado al $id y actualiza los datos de este
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista index de cargos
     * @param Request $request con los datos del formulario
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'min:4|required|unique:Cargos,nombre,'.$id,
        ]);

        try{
            DB::beginTransaction();

                if($request->estatus!=null) {
                    Cargo::find($id)->update([
                        'nombre'=> $request->nombre,
                        'estatus'=> $request->estatus,
                    ]);
                }
                else{
                    Cargo::find($id)->update(['nombre'=> $request->nombre]);
                }


                $secciones = DB::table('Secciones')
                    ->select('id')
                    ->get();

                CargoSeccion::where('cargo_id',$id)->update(['estatus_permiso' => 0]);

                foreach($secciones as $secciom){
                    //Si la puerta fue seclecionada en el check se guarda en la relacion secionn-puerta con un 1
                    // indicando que esta seccion tiene permiso sobre ella
                    if($request[$secciom->id]!=null) {
                        CargoSeccion::where(['cargo_id'=>$id,'seccion_id'=>$request[$secciom->id]])->update(['estatus_permiso'=> 1]);
                    }
                }
            DB::commit();

        } catch (\Exception $ex){
            DB::rollback();
            return redirect('cargos/'.$id.'/edit')->with(['message'=>'Error inesperado al realizar el registro','tipo'=>'error']);
        }
        return redirect('/cargos')->with(['message'=>'El cargo se ha actualizado correctamente','tipo'=>'message']);
    }
}
