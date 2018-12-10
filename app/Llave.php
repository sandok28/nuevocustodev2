<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Llave extends Model implements AuditableContract
{
    //Tabla a la que referencia el modelo
    protected $table = 'llaves';

    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'tipo','llave_rfid','id_asociado','fecha_expiracion'
    ];
}
