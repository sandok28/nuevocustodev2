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
    Por Decidir si usar esta forma para encriptar
    public function setPasswordAttribute($password){
        if(!empty($password)){
            $this->attributes['password'] = \Hash::make($password);
        }
    }
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * Obtiene los permisos relacionados al usuario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany Coleccion con los permisos relacionados al usuario
     */
    public function permisos()
    {
        return $this->belongsToMany('App\Permiso','permisos_usuarios','usuario_id','permiso_id')->withPivot('estatus_permiso');
    }

    /**
     * Obtiene las puertas relacionados al usuario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany Coleccion con las puertas relacionados al usuario
     */
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','puerta_user','user_id', 'puerta_id')->withPivot('estatus_permiso');
    }
}
