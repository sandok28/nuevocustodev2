<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Seccion extends Model implements AuditableContract
{

    //Tabla a la que referencia el modelo
    protected $table = 'Secciones';
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
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany Coleccion con los cargos relacionados a la seccion
     */
    public function cargos()
    {

        return $this->belongsToMany('App\Cargo','Cargos_Secciones','seccion_id','cargo_id');

    }
    /**
     * Obtiene los puertas relacionados a la seccion
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany Coleccion con los cargos relacionados a la seccion
     */
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','Puertas_Secciones','seccion_id','puerta_id')->withPivot('estatus_permiso');
    }

    /**
     * Obtiene los cargos relacionados a la seccion
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\HasMany Coleccion con los cargos relacionados a la seccion
     */
    public function intervalosSecciones()
    {
        return $this->hasMany('App\IntervaloSeccion', 'seccion_id');
    }
}
