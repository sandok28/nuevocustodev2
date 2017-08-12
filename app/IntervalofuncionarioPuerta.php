<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class IntervalofuncionarioPuerta extends Model implements AuditableContract
{
    //Tabla a la que referencia el modelo
    protected $table = 'IntervalosFuncionarios_Puertas';

    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable  = [
        'intervalo_funcionario_id', 'puerta_id',
    ];
}
