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
    //metodo para obtener los datos de la relacion cargo-seccion
    public function cargos()
    {
        return $this->hasMany('App\Cargo', 'secciones_id');
    }
    //metodo para obtener los datos de la relacion cargo-puerta
    public function puertas()
    {
        return $this->belongsToMany('App\Puerta','secciones_puertas','seccion_id','puerta_id')->withPivot('estatus_permiso');
    }
}
