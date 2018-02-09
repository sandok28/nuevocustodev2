<?php

namespace App;


use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model implements AuditableContract
{
    //Tabla a la que referencia el modelo
    protected $table = 'Cargos';

    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'nombre','estatus'
    ];

    /**
     * Obtiene las secciones relacionadas al cargo
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany Coleccion con las secciones relacionadas a la seccion
     */
    public function secciones()
    {
        return $this->belongsToMany('App\Seccion','Cargos_Secciones','cargo_id','seccion_id')->where('estatus_permiso',1);

    }
    public function seccionesActivas()
    {
        return $this->belongsToMany('App\Seccion','Cargos_Secciones','cargo_id','seccion_id')->wherePivot('estatus_permiso',1);
    }
}
