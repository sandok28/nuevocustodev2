<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class PermisosUsuario extends Model implements AuditableContract
{
    use Auditable;



    protected $fillable = [
        'permiso_id', 'usuario_id','estatus_permiso',
    ];

    //
}
