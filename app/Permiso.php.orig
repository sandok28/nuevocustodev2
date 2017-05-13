<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Permiso extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
        'nombre','estatus',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User','permisos_usuarios','usuarios_id');

    }
}
