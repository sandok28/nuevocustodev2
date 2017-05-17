<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class UsuariosPuerta extends Model
{
    use Auditable;
    protected $table = 'puerta_user';

    protected $fillable  = [
        'puerta_id', 'user_id','estatus_permiso',
    ];
}
