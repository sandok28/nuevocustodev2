<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Puertas activas</h3>
            <div class="actions pull-right">
                <i class="fa fa-chevron-down"></i>

            </div>
        </div>
        <div class="panel-body">
            <div class="row form-group">

                <div class="col-xs-12 " >
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <h1>Normales</h1>
                        </div>
                        @foreach($puertasNormales as $puertaNormal)

                            <div class="col-xs-4">
                                {!! Form::checkbox($puertaNormal->id, $puertaNormal->id,$puertaNormal->estatus_en_horario_general,['disabled'=>'true']) !!}
                                {!! Form::label($puertaNormal->nombre) !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <h1>Especiales</h1>
                        </div>

                        @foreach($puertasEspeciales as $puertaEspecial)
                            <div class="col-xs-4">
                                {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id,$puertaEspecial->estatus_en_horario_general,['disabled'=>'true']) !!}
                                {!! Form::label($puertaEspecial->nombre) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
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
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                <thead>
                <tr>

                    <th>desde</th>
                    <th>hasta</th>
                    <th>dias</th>

                </tr>
                </thead>
                <tbody>
                @foreach($intervalosHorarioGeneralAgrupados as $intervaloHorarioGeneralAgrupado)
                    <tr>
                        <td>{{$intervaloHorarioGeneralAgrupado->desde}}</td>
                        <td>{{$intervaloHorarioGeneralAgrupado->hasta}}</td>
                        <td>
                            @foreach($intervaloHorarioGeneralAgrupado->dias as $dia)
                                @if($dia->dia == 1)
                                    Lunes
                                @elseif($dia->dia == 2)
                                    Martes
                                @elseif($dia->dia == 3)
                                    Miercoles
                                @elseif($dia->dia == 4)
                                    Jueves
                                @elseif($dia->dia == 5)
                                    Viernes
                                @elseif($dia->dia == 6)
                                    Sabado
                                @elseif($dia->dia == 7)
                                    Domingo
                                @endif

                            @endforeach
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>