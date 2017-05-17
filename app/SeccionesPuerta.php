<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class SeccionesPuerta extends Model implements AuditableContract
{
    use Auditable;
    protected $fillable  = [
        'puerta_id', 'seccion_id','estatus_permiso',
    ];

}
