<?php

namespace App\Http\Controllers;

use App\Puerta;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GestionAreasController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
        //$this->middleware('GestionarPuertasMiddleware');

        //Para control de puertas
        //$this->middleware('ControlPuertasMiddleware');

        //Para el de auditoria
        //$this->middleware('GestionarAuditoriasMiddleware');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('GestionAreas.index');
    }

    /**
     * Envia la informacion necesaria para mostrar en la vista principal
     * los datos de puertas que se encuentran en la Base de datos.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puertas = Puerta::select(['id','nombre','llave_rfid','ip','estatus','puerta_especial']);
        return  \Datatables::of($puertas)
            ->addColumn('action',function($puerta)
            {
                $aciones = "";
                $aciones = "<div class='btn btn-group'>";
                $aciones = $aciones . '<a href="'.route('puertas.edit',$puerta->id).'" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Editar</a>';
                $aciones =$aciones."</div>";
                return $aciones;
            })
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Controlareas se encarga de filtrar el tipo de puertas segun el User que
     * se encuentre Logeado en el momento en dos variables
     * PuertasNormales y Puertasw Especiales
     *
     * @param  int $id que es el id del usuario logeado en el momento
     * @param  boolean $puertasNormales Filtra y almacena la informacion tipo de puerta del usuario logeado.
     * @param boolean  $puertasEspeciales Filtra y almacena la informacion tipo de puerta del usuario logeado.
     * @return \Illuminate\Http\Response devuelve la vista edit de los intervalos.
     */
    public function controlareas()
    {
        $puertasNormales = Auth::User()->puertas->where('puerta_especial',0);
        $puertasEspeciales = Auth::User()->puertas->where('puerta_especial',1);

        return view('ControlAreas.index',['puertasEspeciales'=>$puertasEspeciales,'puertasNormales'=>$puertasNormales]);

    }
}
