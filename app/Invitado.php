<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Invitado extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'nombre', 'apellido', 'cedula','celular','correo','fecha_nacimiento','foto'
    ];

    /**
     * Obtiene las puertas relacionadas al invitado
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con las puertas relacionadas al invitado
     */
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','horario_invitado','invitados_id', 'puertas_id')->withPivot('targeta_rfid','desde','hasta');
    }

    /**
     * Obtiene los intervalos relacionados al invitado
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Coleccion con los intervalos relacionados al invitado
     */
    public function intervalos()
    {
        return $this->hasMany('App\Intervalo', 'invitado_id');
    }
}
