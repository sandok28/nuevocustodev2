<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Ingreso extends Model implements AuditableContract
{
    //indico que la tabla se debe auditar
    use Auditable;

}
