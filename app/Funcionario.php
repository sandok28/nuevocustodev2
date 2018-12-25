<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Funcionario extends Model implements AuditableContract
{

    //Tabla a la que referencia el modelo
    protected $table = 'Funcionarios';

    //indico que la tabla se debe auditar
    use Auditable;

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'foto',
    ];


    //indico los atributos de la tabla que se pueden modificar desde la vista
    protected $fillable = [
        'nombre',
        'apellido',
        'cedula',
        'fecha_nacimiento',
        'correo',
        'tarjeta_rfid',
        'cargo_id',
        'foto',
        'celular',
        'horario_normal',
        'licencia',
        'estatus_licencia',
        'estatus',
        'dado_de_baja',
    ];


    /**
     * Obtiene las licecias relacionadas al funcionario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\HasMany  Coleccion con las licecias relacionadas al funcionario
     */
    public function licencias()
    {
        return $this->hasMany('App\Licencia', 'funcionario_id');
    }


    /**
     * Obtiene  el cargo relacionado al funcionario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo Objeto del Cargo relacionado al funcionario
     */
    public function cargo()
    {

        return $this->belongsTo('App\Cargo','cargo_id');
    }

    /**
     * Obtiene los intervalos_funcionarios especiales relacionadas al funcionario
     *
     * @author Edwin Sandoval
     * @return \Illuminate\Database\Eloquent\Relations\HasMany  Coleccion con los intervalos_funcionarios especiales relacionadas al funcionario
     */
    public function horariosEspeciales()
    {
        return $this->hasMany('App\Intervalofuncionario', 'funcionario_id');
    }


}
