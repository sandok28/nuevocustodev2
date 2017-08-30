<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Lista De Puertas Asignadas</h3>
            <div class="actions pull-right">
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-times"></i>
            </div>
        </div>
        <div class="panel-body">
            <div class="row form-group">

                <div class="col-xs-12 " >
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <h1>Puertas normales</h1>
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
                            <h1>Puertas especiales</h1>
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
            <h3 class="panel-title">Lista de intervalos</h3>
            <div class="actions pull-right">
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-times"></i>
            </div>
        </div>
        <div class="panel-body">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>dia</th>
                    <th>desde</th>
                    <th>hasta</th>

                </tr>
                </thead>
                <tbody>
                @foreach($intervalosHorarioGeneral as $intervaloHorarioGeneral)
                    <tr>
                        @if($intervaloHorarioGeneral->dia == 1)
                            <td>Lunes</td>
                        @elseif($intervaloHorarioGeneral->dia == 2)
                            <td>Martes</td>
                        @elseif($intervaloHorarioGeneral->dia == 3)
                            <td>Miercoles</td>
                        @elseif($intervaloHorarioGeneral->dia == 4)
                            <td>Jueves</td>
                        @elseif($intervaloHorarioGeneral->dia == 5)
                            <td>Viernes</td>
                        @elseif($intervaloHorarioGeneral->dia == 6)
                            <td>Sabado</td>
                        @elseif($intervaloHorarioGeneral->dia == 7)
                            <td>Domingo</td>
                        @endif
                        <td>{{$intervaloHorarioGeneral->desde}}</td>
                        <td>{{$intervaloHorarioGeneral->hasta}}</td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>