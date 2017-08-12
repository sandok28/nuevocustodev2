<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntervaloSeccion extends Model
{
    //Tabla a la que referencia el modelo
    protected $table = 'IntervalosSecciones';

    //indico que la tabla se debe auditar
    use Auditable;


}
