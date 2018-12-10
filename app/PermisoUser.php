<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class PermisoUser extends Model implements AuditableContract
{


    //Tabla a la que referencia el modelo
    protected $table = 'Permisos_Users';

    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'permiso_id', 'usuario_id','estatus_permiso',
    ];

    //
}
