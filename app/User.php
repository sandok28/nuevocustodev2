<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{
    use Auditable;
    use Notifiable;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    public function permisos()
    {
        return $this->belongsToMany('App\Permiso','permisos_usuarios','usuario_id','permiso_id')->withPivot('estatus_permiso');
    }

    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','puerta_user','user_id', 'puerta_id')->withPivot('estatus_permiso');
    }
}
