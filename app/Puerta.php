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
        'puerta_especial', 'nombre', 'llave_rfid', 'ip','created_at','updated_at',
    ];

    //metodo para obtener los datos de la relacion puerta-user
    public function usuarios()
    {
        return $this->belongsToMany('App\User','puerta_user','puerta_id','user_id')->withPivot('estatus_permiso');;
    }
    //metodo para obtener los datos de la relacion puerta-seccion
    public function secciones()
    {
        return $this->belongsToMany('App\Seccion','secciones_puertas','puerta_id','seccion_id')->withPivot('estatus_permiso');
    }
}
