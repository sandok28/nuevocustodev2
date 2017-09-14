<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Intervalofuncionario extends Model implements AuditableContract
{

    //Tabla a la que referencia el modelo
    protected $table = 'IntervalosFuncionarios';

    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'desde', 'hasta', 'dia','funcionario_id','created_at',
    ];

    /**
     * Obtiene las puertas relacionados al horario especial
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con las puertas  relacionados al horario especial
     */
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','IntervalosFuncionarios_Puertas', 'intervalo_funcionario_id', 'puerta_id');
    }
}
