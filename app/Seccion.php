<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Seccion extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'nombre','estatus',
    ];


    /**
     * Obtiene los cargos relacionados a la seccion
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Coleccion con los cargos relacionados a la seccion
     */
    public function cargos()
    {
        return $this->hasMany('App\Cargo', 'secciones_id');
    }
    /**
     * Obtiene los puertas relacionados a la seccion
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany Coleccion con los cargos relacionados a la seccion
     */
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','secciones_puertas','seccion_id','puerta_id')->withPivot('estatus_permiso');
    }
}
