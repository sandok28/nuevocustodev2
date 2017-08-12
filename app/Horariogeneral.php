<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Horariogeneral extends Model
{

    //Tabla a la que referencia el modelo
    protected $table = 'horariosGenerales';

    //indico que la tabla se debe auditar
    use Auditable;
}
