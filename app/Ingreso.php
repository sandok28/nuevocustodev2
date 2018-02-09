<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Ingreso extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //Tabla a la que referencia el modelo
    protected $table = 'ingresos';

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'fecha_hora',
        'autorizado',
        'created_at',
        'updated_at',
        'funcionario_id',
        'puertas_id',
        'invitados_id'
    ];
    //indico que la tabla se debe auditar
    use Auditable;

}
