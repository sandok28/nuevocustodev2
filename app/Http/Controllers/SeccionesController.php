<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Seccion;
use App\Cargo;
use App\Puerta;
use App\PuertaSeccion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;
class SeccionesController extends Controller
{
<<<<<<< HEAD
     /**
=======
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('GestionarSeccionesMiddleware');
    }

    //Comentar de nuevo todo esto

    /**
>>>>>>> upstream/nuevocustode_dv
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

    public function listar_secciones()
    {
        $secciones = \App\Seccion::select(['nombre','estatus']);
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
        $this->validate($request, [
            'nombre' => 'required|unique:Secciones|min:4',
        ]);
        try{
            DB::beginTransaction();
                DB::table('Secciones')->insert([
                                                'nombre'=>$request->nombre,
                                                'estatus'=> '1',
                                                'created_at'=>Carbon::now()->toDateTimeString()
                                            ]);

                //obtengo la ultima seccion que se creo es decir la que acabamos de crear
                $seccion = DB::table('Secciones')
                            ->select('id')
                            ->orderBy('created_at', 'desc')
                            ->first();

                //Relaciono la seccion que se acabo de crear con todas las puertas existentes
                $puertas = DB::table('Puertas')
                            ->select('id')
                            ->get();

                foreach($puertas as $puerta){
                    DB::table('Puertas_Secciones')->insert([
                                                            'seccion_id' => $seccion->id,
                                                            'puerta_id' => $puerta->id,
                                                            'estatus_permiso' => 0
                                                        ]);
                }
                //Relaciono la seccion que se acabo de crear con todos las cargos existentes
                $cargos = DB::table('Cargos')
                            ->select('id')
                            ->get();

                foreach($cargos as $cargo){

                    DB::table('Cargos_Secciones')
                        ->insert([
                            'cargo_id'=> $cargo->id,
                            'seccion_id'=> $seccion->id,
                            'estatus_permiso'=>'0'
                        ]);
                }

            DB::commit();
        }
        catch (\Exception $ex){
            dd($ex);
            return redirect('/secciones/create')->with(['message'=>'A ocurrido un error','tipo'=>'error']);
        }

        return redirect('/secciones/'.$seccion->id.'/edit')->with(['message'=>'La seccion se ha registrado correctamente','tipo'=>'message']);

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
        $puertasEspecialesActivas = Seccion::find($id)->puertas()->where('puerta_especial',1)->get();

        //creo una coleccion con todas las puestas normal relacionas a la seccion
        $puertasNormalesActivas = Seccion::find($id)->puertas()->where('puerta_especial',0)->get();
        $cargos = $seccion->cargos()->where('estatus_permiso',1)->get();


        $puertasNormales = DB::table('Puertas')
                            ->join('Puertas_Secciones', 'Puertas.id', '=', 'Puertas_Secciones.puerta_id')
                            ->join('Secciones', 'Secciones.id', '=', 'Puertas_Secciones.seccion_id')
                            ->join('Puertas_Users','Puertas.id', '=','Puertas_Users.puerta_id')
                            ->join('Users','Users.id','=','Puertas_Users.user_id')
                            ->where('Puertas.puerta_especial',0)
                            ->where('Users.id',Auth::User()->id)
                            ->where('Secciones.id',$id)
                            ->where('Puertas_Users.estatus_permiso',1)
                            ->select('Puertas.id', 'Puertas.nombre','Users.email','Puertas_Secciones.estatus_permiso')
                            ->get();
        $puertasEspeciales = DB::table('Puertas')
                            ->join('Puertas_Secciones', 'Puertas.id', '=', 'Puertas_Secciones.puerta_id')
                            ->join('Secciones', 'Secciones.id', '=', 'Puertas_Secciones.seccion_id')
                            ->join('Puertas_Users','Puertas.id', '=','Puertas_Users.puerta_id')
                            ->join('Users','Users.id','=','Puertas_Users.user_id')
                            ->where('Puertas.puerta_especial',1)
                            ->where('Users.id',Auth::User()->id)
                            ->where('Secciones.id',$id)
                            ->where('Puertas_Users.estatus_permiso',1)
                            ->select('Puertas.id', 'Puertas.nombre','Puertas_Secciones.estatus_permiso')
                            ->get();

        //Devuelvo la vista edit de secciones y le paso la $seccion, $puertasEspeciales y $puertasNormales.
        return view('secciones.edit',[
                                                'seccion'=>$seccion,
                                                'puertasEspeciales'=>$puertasEspeciales,
                                                'puertasNormales'=>$puertasNormales,
                                                'puertasEspecialesActivas'=>$puertasEspecialesActivas,
                                                'puertasNormalesActivas'=>$puertasNormalesActivas,
                                                'cargos'=>$cargos
                                            ]);
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

        $this->validate($request, [
            'nombre' => 'min:4|required|unique:Secciones,nombre,'.$id,
        ]);
        //obtengo la seccion relacionada al id que llego
        $seccion = Seccion::find($id);

        //creo una coleccion con todas las puertas
        $todasPuertasDelUsuario = DB::table('Puertas')
                                        ->join('Puertas_Secciones', 'Puertas.id', '=', 'Puertas_Secciones.puerta_id')
                                        ->join('Secciones', 'Secciones.id', '=', 'Puertas_Secciones.seccion_id')
                                        ->join('Puertas_Users','Puertas.id', '=','Puertas_Users.puerta_id')
                                        ->join('Users','Users.id','=','Puertas_Users.user_id')
                                        ->where('Users.id',Auth::User()->id)
                                        ->where('Secciones.id',$id)
                                        ->where('Puertas_Users.estatus_permiso',1)
                                        ->select('Puertas.id', 'Puertas.nombre','Users.email','Puertas_Secciones.estatus_permiso')
                                        ->get();
        //las itero para obtener cada puerta registrada
        foreach($todasPuertasDelUsuario as $puerta){
            //Si la puerta fue seclecionada en el check se guarda en la relacion secionn-puerta con un 1
            // indicando que esta seccion tiene permiso sobre ella
            if($request[$puerta->id]!=null){
                PuertaSeccion::where('seccion_id', $seccion->id)
                    ->where('puerta_id', $request[$puerta->id])
                    ->update(['estatus_permiso' => 1]);
            }
            else{
                //Si la puerta no fue seclecionada en el check se guarda en la relacion secionn-puerta con un 0
                // indicando que esta seccion no tiene permiso sobre ella
                PuertaSeccion::where('seccion_id', $seccion->id)
                    ->where('puerta_id', $puerta->id)
                    ->update(['estatus_permiso' => 0]);
            }
        }
        //actualizo la informacion como tal
        $seccion->fill($request->all());
        $seccion->save();
        Session::flash('message','Seccion Actualizada Correctamente');

        return redirect('/secciones')->with(['message'=>'La seccion se ha actualizado correctamente','tipo'=>'message']);
    }
}
