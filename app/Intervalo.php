<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Intervalo extends Model implements AuditableContract
{


    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'desde', 'hasta', 'targeta_rfid','invitado_id'
    ];
    /**
     * Obtiene las puertas relacionadas al intervalo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con las puertas relacionadas al intervalo
     */
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','intervalo_puertas', 'intervalo_id', 'puerta_id');
    }
}
