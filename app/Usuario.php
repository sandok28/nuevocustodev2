<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Usuario extends Model implements AuditableContract
{
    use Auditable;
    //
    protected $fillable = [
        'nombre', 'contrasena','estatus',
    ];

    public function setPasswordAttribute($contrasena){
        if(!empty($contrasena)){
            $this->attributes['contrasena'] = \Hash::make($contrasena);
        }
    }

}
