<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Funcionario extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
        'nombre', 'apellido', 'cedula','cargo_id','dado_de_baja','created_at','updated_at',
    ];

}
