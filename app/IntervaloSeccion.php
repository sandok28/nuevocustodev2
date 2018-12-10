<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class IntervaloSeccion extends Model implements AuditableContract
{
    //Tabla a la que referencia el modelo
    protected $table = 'IntervalosSecciones';

    use Auditable;
    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'desde',
        'hasta',
        'dia',
        'seccion_id'
    ];




}
