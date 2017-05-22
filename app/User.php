<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{
    use Notifiable;

    //indico que la tabla se debe auditar
    use Auditable;

    //indico la tabla a la que hace referencia el modelo
    protected $table = 'users';

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'name', 'email', 'password','estatus',
    ];
    /**
    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = \Hash::make($password);
        }
    }
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    //metodo para obtener los datos de la relacion user-permiso
    public function permisos()
    {
        return $this->belongsToMany('App\Permiso','permisos_usuarios','usuario_id','permiso_id')->withPivot('estatus_permiso');
    }
    //metodo para obtener los datos de la relacion user-puerta
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','puerta_user','user_id', 'puerta_id')->withPivot('estatus_permiso');
    }
}
