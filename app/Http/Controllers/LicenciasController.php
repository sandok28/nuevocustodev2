<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Licencia;
use App\Funcionario;
use Session;
use Redirect;
class LicenciasController extends Controller
{
    /**
     * Llama a la vista index donde se listan todos las licencias
     *
     *
     * @author Edwin_Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de licencias
     * y le paso
     * $licenciasActivas coleccion con todas las licencias activas
     * $licenciasConcluidas coleccion con todas las licencias concluidas
     */
    public function index()
    {
        //obtengo una coleccion con todas las licencias activas
        $licenciasActivas=Licencia::all()->where('estatus',1);

        //obtengo una coleccion con todas las licencias concluidas
        $licenciasConcluidas=Licencia::all()->where('estatus',0);

        //Creo una varible carbon para el manejo de fechas
        $carbon = new \Carbon\Carbon();

        //itero $licenciasActivas para agregar 2 atributos mas a cada una de las licencias activas
        //$licenciaActiva->vigencia la cual guarda los dias totales que dura la licencia
        //$licenciaActiva->restante la cual guarda los dias que restan para que termine licencia
        foreach($licenciasActivas as $licenciaActiva){
            $hastaArray = explode("-", $licenciaActiva->hasta);
            $desdeArray = explode("-", $licenciaActiva->desde);
            $hasta = \Carbon\Carbon::createFromDate($hastaArray[0],$hastaArray[1],$hastaArray[2]);
            $desde = \Carbon\Carbon::createFromDate($desdeArray[0],$desdeArray[1],$desdeArray[2]);
            $licenciaActiva->vigencia = $desde->diffInDays($hasta);

            $hoyArray = explode("-", $carbon->now()->toDateString());
            //dd($hoyArray);
            $hoy = \Carbon\Carbon::createFromDate($hoyArray[0],$hoyArray[1],$hoyArray[2]);
            $licenciaActiva->restante = $hoy->diffInDays($hasta);


            //si la vigencia es menor a los dias restantes entonces la vigencia es igual a los dias restantes
            if ($licenciaActiva->vigencia < $licenciaActiva->restante){
                $licenciaActiva->restante = $licenciaActiva->vigencia;
            }
        }
        //itero $licenciasConcluidas para agregar un atributo mas a cada una de las licencias concluidad
        //$licenciaConcluida->vigencia la cual guarda los dias totales que dura la licencia
        foreach($licenciasConcluidas as $licenciaConcluida){
            $hastaArray = explode("-", $licenciaConcluida->hasta);
            $desdeArray = explode("-", $licenciaConcluida->desde);
            $hasta = \Carbon\Carbon::createFromDate($hastaArray[0],$hastaArray[1],$hastaArray[2]);
            $desde = \Carbon\Carbon::createFromDate($desdeArray[0],$desdeArray[1],$desdeArray[2]);
            $licenciaConcluida->vigencia =  $desde->diffInDays($hasta);
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
        $funcionario = Funcionario::find($funcionario_id);
        return view('licencias.create',compact('funcionario'));
    }

    /**
     * Crea una nueva licencia con los datos que recibe del formulario
     * y la relacionamos al funcionario por medio de $funcionario_id
     * por defecto asigna el estatus de la nueva licencia en 1 indicando que esta activa
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista index de licencias
     * @param Request $request con los datos del formulario
     * @param integer $funcionario_id id del funcionario  al que va pertenercer la licencia
     */
    public function store(Request $request, $funcionario_id)
    {
        Licencia::create([
            'desde'=> $request['desde'],
            'hasta'=> $request['hasta'],
            'estatus' => 1,
            'funcionario_id'=> $funcionario_id,
        ]);
        return redirect('/licencias')->with('message','La licencia  ha registrada correctamente');
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
        return view('licencias.edit',['licencia'=>$licencia]);
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
        $licencia = Licencia::find($id);
        $licencia->fill($request->all());
        $licencia->save();
        Session::flash('message','Licencia Actualizada Correctamente');

        return Redirect::to('/licencias');
    }
}
