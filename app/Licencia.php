<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Licencia extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'desde', 'hasta', 'estatus','funcionario_id'
    ];

    /**
     * Obtiene el funcionario relacionado a la licencia
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Objeto del funcionario relacionado a la licencia
     */
    public function funcionario()
    {
        return $this->belongsTo('App\Funcionario', 'funcionario_id');
    }
}
