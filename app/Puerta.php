<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Puerta extends Model implements AuditableContract
{
    use Auditable;
    //
    protected $fillable = [
        'puerta_especial',
        'nombre',
        'llave_rfid',
        'ip',
        'estatus',
        'created_at',
        'updated_at',
    ];
}
