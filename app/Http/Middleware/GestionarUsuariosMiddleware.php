<?php

namespace App\Http\Middleware;


use Closure;
use App\User;
use Illuminate\Contracts\Auth\Guard;

class GestionarUsuariosMiddleware
{
    protected $auth;
    public function __construct(Guard $auth){
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $ususario = User::find($this->auth->user()->id);

        $permiso_permitido = false;
        foreach ($ususario->permisos as $permiso){
            if($permiso->pivot->estatus_permiso == 1 && $permiso->nombre == 'Gestionar usuarios'){
                $permiso_permitido = true;
            }
        }
        if(!$permiso_permitido){
            return redirect()->to('/home');
        }
        return $next($request);
    }
}
