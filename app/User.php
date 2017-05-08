<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
        return $this->belongsToMany('App\Permiso','permisos_usuarios','permisos_id');
    }
}
