<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Funcionario extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'nombre',
        'apelido',
        'cedula',
        'fecha_nacimiento',
        'correo',
        'tarjeta_rfid',
        'cargos_id',
        'foto',
        'celular',
        'hoario_normal',
        'licencia',
        'estatus',
        'dado_de_baja',
    ];

    /**
     * Obtiene las licecias relacionadas al funcionario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\HasMany  Coleccion con las licecias relacionadas al funcionario
     */
    public function licencias()
    {
        return $this->hasMany('App\Licencia', 'funcionario_id');
    }


    /**
     * Obtiene  el cargo relacionado al funcionario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Objeto del Cargo relacionado al funcionario
     */
    public function cargo()
    {
        return $this->belongsTo('App\Cargo','cargos_id');
    }

}
