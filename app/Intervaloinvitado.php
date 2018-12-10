<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Intervaloinvitado extends Model implements AuditableContract
{
    //Tabla a la que referencia el modelo
    protected $table = 'IntervalosInvitados';

    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'desde', 'hasta', 'targeta_rfid','invitado_id','fecha'
    ];
    /**
     * Obtiene las puertas relacionadas al intervalo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con las puertas relacionadas al intervalo
     */
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','IntervalosInvitados_Puertas', 'intervalo_invitado_id', 'puerta_id');
    }
}
