<?php

namespace App;


use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model implements AuditableContract
{
    use Auditable;
    protected $fillable = [
        'nombre', 'estatus','secciones_id'
    ];
}
