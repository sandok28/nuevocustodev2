<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Horariogeneral;
use App\Intervalofuncionario;
use App\Intervaloinvitado;
use App\IntervaloSeccion;
use App\Invitado;
use App\Llave;
use App\Puerta;
use App\PuertaSeccion;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['only'=>'index']);
    }


    //ESTA CLASE SE ENCARGA DE TODAS LAS VISTAS GENERALES QUE NO PERTENECEN AUN MODULO EN PARTICULAR

    /**
     * No hace nada en concreto solo llama a la vista Home
     * esta vista es la vista principal del programa
     *
     * @author Edwin_Sandoval
     * @return \Illuminate\Http\Response devuelve la vista index de home la cual es la vita general del software
     */
    function index(){
        return view('home.index');
    }

    function inicial(){

        $progreso =0;

        $num_puertas = DB::table('Puertas')->count();
        $num_control_puertas = DB::table('Puertas_Users')
                            ->where('estatus_permiso','1')
                            ->count();
        $num_horario_general= DB::table('HorariosGenerales')->count();
        $num_secciones= DB::table('secciones')->count();
        $num_cargos= DB::table('cargos')->count();
        $num_funcionarios= DB::table('funcionarios')->count();
        $num_usuarios= DB::table('users')->count();

        if($num_puertas > 0) $progreso = $progreso + 15;
        if($num_control_puertas > 0) $progreso = $progreso + 5;
        if($num_horario_general > 0) $progreso = $progreso + 20;
        if($num_secciones > 0) $progreso = $progreso + 15;
        if($num_cargos > 0) $progreso = $progreso + 15;
        if($num_funcionarios > 0) $progreso = $progreso + 15;
        if($num_usuarios > 1) $progreso = $progreso + 15;

        return view('home.inicial',['progreso'=>$progreso,
            'num_puertas'=>$num_puertas,
            'num_control_puertas'=>$num_control_puertas,
            'num_horario_general'=>$num_horario_general,
            'num_secciones'=>$num_secciones,
            'num_cargos'=>$num_cargos,
            'num_funcionarios'=>$num_funcionarios,
            'num_usuarios'=>$num_usuarios
            ]);
    }

    /**
     * No hace nada en concreto solo llama a la vista Login
     * actulemnte esta vita es la raiz "/" en las rutas
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response devuelve la vista login de home la cual es la vita donde lo usuarios pueden logear
     */
    function iniciosession(){
        return view('home.login');
    }



    /**
     * Verifica los datos del usuriario e inicia sesion con la ayuda de la libreria Auth
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redireccina a la vista Home si los datos del usuario son correctos
     * en caso contrario redirecciona a la vista de Login de nuevo
     * @param LoginRequest $request con los datos del formulario de login nombre y contraseña
     */
    function login(LoginRequest $request){
        if(Auth::attempt(['email'=>$request['email'], 'password'=> $request['password']])){
            return redirect('/home');
        }
        return redirect('/')->with(['message'=>'Contraseña o Usuario Invalido','tipo'=>'error']);
    }

    /**
     * Cierra sesion con la ayuda de la libreria Auth
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Http\Response Redirecciona a la vista de login de home
     * @param LoginRequest $request con los datos del formulario de login nombre y token
     */
    public function logout(LoginRequest $request)
    {
        Auth::logout();
        return redirect('/');
    }
  /**
   * holamundo recibe parametros por las variables $dispoip,$uid llegan limpias y directas
   * holamundo2 recibe parametros por la request
   **/
    function holamundo($dispoip,$uid)
    {
        return "".$dispoip.$uid;
    }
    function holamundo2(Request $request)
    {
        $dispoip = $request->dispoip;
        $uid = $request->uid;
        //dc4c102b
        //60df1983
        $carbon = new \Carbon\Carbon();
        $dia = $carbon::now()->dayOfWeek;
        $hora = $carbon::now()->hour;
        $minutos = $carbon::now()->minute;
        //echo 'dia'.$dia,'hora:'.$hora,'minuto'.$minutos;
        $horadellegada = $carbon::createFromFormat('H:i:s', $hora . ':' . $minutos . ':' . '00');
        //$horadellegada = $carbon::createFromFormat('H:i:s', '08' . ':' . '32' . ':' . '00');
        $TipoUsuario = Llave::select('tipo')->where('llave_rfid', $uid)->get()[0]->tipo;//tipo de usuario segun la llave 0 para funcionario 1 para invitado
        //dd($TipoUsuario);
        $IdUsuario = Llave::select('id_asociado')->where('llave_rfid', $uid)->get()[0]->id_asociado;//obtengo el ide_asociado a la llave rfid
        //1)verificar si la llave existe en la tabla llaves.
        $llaveentrada = Llave::where('llave_rfid', $uid)->count();//comparo si la llave existe
        if ($llaveentrada==0) {
            return 'LA LLAVE NO EXISTE';
        } else {
                //return 'PUEDE ENTRAR LICENCIA ACTIVA ESTATUS 1 ';
                //2)verificar si llave asociada a un funcionario o un usuario.
                //dd($TipoUsuario,$IdUsuario);
                if ($TipoUsuario == 0)
                {
                    //return 'FUNCIONARIO';
                    //3.1)si es un funcionario->verificar horario(general,propio,secciones(cargo))
                    $horariofuncionario = Funcionario::select('horario_normal')->where('id', $IdUsuario)->get()[0]->horario_normal;
                    //dd($horariofuncionario);
                    if ($horariofuncionario == 0)//horario general de la empresa
                    {
                        //identificar la puerta donde quiere entrar
                        $estatus_general = Puerta::select('estatus_en_horario_general')->where('ip', $dispoip)->where('estatus', 1)->count();
                        //dd($estatus_general);
                        if ($estatus_general == 1) {
                            $horariogeneralempresa = Horariogeneral::select('desde', 'hasta')->where('dia', $dia)->get();
                            foreach ($horariogeneralempresa as $horarioindividualempresa) {
                                $desdebdvalido = $carbon::createFromFormat('H:i:s', $horarioindividualempresa->desde);
                                $hastabdvalido = $carbon::createFromFormat('H:i:s', $horarioindividualempresa->hasta);
                                $estaensuhora = $horadellegada->diffInMinutes($desdebdvalido, false) * $horadellegada->diffInMinutes($hastabdvalido, false);
                                echo $horadellegada.'hora llegada;'.$desdebdvalido.'desde valida;'.$hastabdvalido.'hasta valido;'.$horadellegada->diffInMinutes($desdebdvalido,false).'desde diff min'.$horadellegada->diffInMinutes($hastabdvalido,false).'hasta diff min';
                                if ($estaensuhora < 0) {
                                    return 'PASO HORARIO CORRECTO';
                                }
                            }
                            return 'NO PASO POR HORARIOS';
                        }
                        return 'NO PASO';

                    }
                    if ($horariofuncionario == 1)//horario propio del funcionario
                    {
                        $activo_licencia = Funcionario::select('estatus', 'licencia')->where('id', $IdUsuario)->get();
                        if($activo_licencia[0]->estatus==1 && $activo_licencia[0]->licencia ==0 )
                        {
                            $intervalofuncionariopropio = Intervalofuncionario::select('desde', 'hasta')
                                ->where([['funcionario_id', '=', $IdUsuario], ['dia', '=', $dia]])
                                ->get();
                            foreach ($intervalofuncionariopropio as $intervaloporhora)
                            {
                                $desdebdvalido = $carbon::createFromFormat('H:i:s', $intervalofuncionariopropio[0]->desde);
                                $hastabdvalido = $carbon::createFromFormat('H:i:s', $intervalofuncionariopropio[0]->hasta);
                                $estaensuhora = $horadellegada->diffInMinutes($desdebdvalido, false) * $horadellegada->diffInMinutes($hastabdvalido, false);
                                echo $desdebdvalido,$hastabdvalido,$estaensuhora;
                                if($estaensuhora<0)
                                {
                                    $funcionarios = Funcionario::find($IdUsuario)->horariosEspeciales;
                                    foreach ($funcionarios as $funcionario)
                                    {
                                        foreach ($funcionario->puertas as $buscaip){
                                            if($buscaip->ip  == $dispoip)
                                            {
                                                return 'ESTA EN LA PUERTA CON LA IP ASIGNADA';
                                            }
                                            else{return 'NO TIENE ACCESO A ESTA PUERTA POR IP';}
                                        }
                                    }
                                }
                                else {return 'NO PASA ESTA EN SU HORA ENTRADA Y SU DIA';}
                            }
                            return 'NO PASA ESTA EN SU HORA ENTRADA Y SU DIA';

                        }else{return 'EL FUNCIONARIO ESTA DE LICENCIA';}

                    }
                    if ($horariofuncionario == 2)//horario asignado al cargo
                    {
                        $secciones = Funcionario::find($IdUsuario)->cargo->seccionesActivas;
                        foreach ($secciones as $seccion) {
                            $consulta = $seccion->puertas->where('estatus', '1')->where('ip', $dispoip)->count();
                            if ($consulta == 1)
                            {
                                //dd($seccion->intervalosSecciones->where('dia',$dia));
                                foreach ($seccion->intervalosSecciones->where('dia', $dia) as $intervalo)
                                {
                                    $desdebdvalido = $carbon::createFromFormat('H:i:s', $intervalo->desde);
                                    $hastabdvalido = $carbon::createFromFormat('H:i:s', $intervalo->hasta);
                                    $estaensuhora = $horadellegada->diffInMinutes($desdebdvalido, false) * $horadellegada->diffInMinutes($hastabdvalido, false);
                                    if ($estaensuhora < 0)
                                    {
                                        return 'ESTA EN SU HORA ENTRADA Y SU DIA';
                                    }
                                    else {
                                        return 'NO ESTA EN SU HORA DE ENTRADA Y SU DIA';
                                        }
                                }return 'NO HAY INTERVALOS EN SU DIA';
                            } else {
                                return 'PUERTA SIN PERMISO';
                                }
                        }return 'SECCION NO ENCONTRADA ACTIVA AL FUNCIONARIO';
                        } else {
                        return 'NO COINCIDE EL HORARIO ASIGNADO AL CARGO DEL FUNCIONARIO';
                    }
                }
                if($TipoUsuario == 1)
                {
                    $intervalosinvitados = Intervaloinvitado::select('desde','hasta','invitado_id')->where('targeta_rfid',$uid)->where('fecha','>=',$carbon::now()->toDateString())->get();
                    //$intervalosinvitados1 = Intervaloinvitado::find($intervalosinvitados[0]->invitado_id)->get();
                    foreach ($intervalosinvitados as $intervalosinvitado)
                        {
                            $desdebdvalido = $carbon::createFromFormat('H:i:s', $intervalosinvitado->desde);
                            $hastabdvalido = $carbon::createFromFormat('H:i:s', $intervalosinvitado->hasta);
                            $estaensuhora = $horadellegada->diffInMinutes($desdebdvalido, false) * $horadellegada->diffInMinutes($hastabdvalido, false);
                            //echo 'OPERACION: '.$estaensuhora.';';
                            if ($estaensuhora < 0)
                            {
                                foreach ($intervalosinvitado->puertas as $puerta)
                                {

                                    if($puerta->ip == $dispoip)
                                    {
                                        return 'ACCESO A PUERTA';
                                    }else{return 'NO HAY PUERTA';
                                    }
                                }
                            }return 'ESTA EN SU HORA DE ENTRADA ENTRADA PERO NO EN SU PUERTA';
                        }
                        return 'ESTE INVITADO NO TIENE ASIGNADO UNA HORA DE ENTRADA';



                }
        }

    }
}
