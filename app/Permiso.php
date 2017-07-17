<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Permiso extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'nombre','estatus',
    ];


    /**
     * Obtiene los usuarios relacionadas al permiso
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany Coleccion con los usuarios relacionadas al permiso
     */
    public function users()
    {
        return $this->belongsToMany('App\User','permisos_usuarios','usuarios_id');
    }
}
