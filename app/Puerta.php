<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Puerta extends Model implements AuditableContract
{
    use Auditable;
    //
    protected $fillable = [
        'puerta_especial', 'nombre', 'llave_rfid', 'ip','created_at','updated_at',
    ];
    public function usuarios()
    {
        return $this->belongsToMany('App\User','puerta_user','puerta_id','user_id')->withPivot('estatus_permiso');;
    }
    public function secciones()
    {
        return $this->belongsToMany('App\Seccion','secciones_puertas','puerta_id','seccion_id')->withPivot('estatus_permiso');
    }
}
