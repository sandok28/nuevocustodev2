<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Puerta extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'puerta_especial',
        'nombre',
        'llave_rfid',
        'ip',
        'estatus',
        'created_at',
        'updated_at',
    ];

    /**
     * Obtiene los usuarios relacionados a la puerta
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con los usuarios relacionados a la puerta
     */
    public function usuarios()
    {
        return $this->belongsToMany('App\User','puerta_user','puerta_id','user_id')->withPivot('estatus_permiso');;
    }

    /**
     * Obtiene las secciones relacionadas a la puerta
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con las secciones relacionadas a la puerta
     */
    public function secciones()
    {
        return $this->belongsToMany('App\Seccion','secciones_puertas','puerta_id','seccion_id')->withPivot('estatus_permiso');
    }

    /**
     * Obtiene los intervalos relacionados a la puerta
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con los intervalos relacionados a la puerta
     */
    public function intervalos()
    {
        return $this->belongsToMany('App\Intervalo','intervalo_puertas', 'puerta_id', 'intervalo_id');
    }
}
