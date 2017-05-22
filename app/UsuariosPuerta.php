<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class UsuariosPuerta extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //indico la tabla a la que hace referencia el modelo
    protected $table = 'puerta_user';

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable  = [
        'puerta_id', 'user_id','estatus_permiso',
    ];
}
