<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Horariogeneral extends Model implements AuditableContract
{

    //Tabla a la que referencia el modelo
    protected $table = 'horariosGenerales';

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'desde',
        'hasta',
        'dia',
    ];
    //indico que la tabla se debe auditar
    use Auditable;
}
