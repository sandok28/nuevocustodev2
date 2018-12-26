<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Lista De intervalos y Puertas Asignadas a la sección {{$seccion->nombre}}</h3>
            <div class="actions pull-right">
                <i class="fa fa-chevron-down"></i>

            </div>
        </div>
        <div class="panel-body">
            <div class="row form-group">

                <div class="col-xs-12 " >
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <h1>Puertas normales</h1>
                        </div>
                        @foreach($seccion->puertas->where('puerta_especial','0') as $puertaNormal)

                            <div class="col-xs-6">
                                {!! Form::checkbox($puertaNormal->id, $puertaNormal->id,$puertaNormal->pivot->estatus_permiso,['disabled'=>'true']) !!}
                                {!! Form::label($puertaNormal->nombre) !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <h1>Puertas especiales</h1>
                        </div>
                        @foreach($seccion->puertas->where('puerta_especial','1')  as $puertaEspecial)
                            <div class="col-xs-6">
                                {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id,$puertaEspecial->pivot->estatus_permiso,['disabled'=>'true']) !!}
                                {!! Form::label($puertaEspecial->nombre) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Intervalos de tiempo</h3>
                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>

                        </div>
                    </div>
                    <div class="panel-body">
                        @include('intervalos_secciones.show')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
