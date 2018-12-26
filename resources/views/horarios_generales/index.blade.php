@extends('layouts.principal')

@section('titel')
    index Horario General
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}

    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Asignar puertas</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div class="row form-group">
                    {!!Form::open(['route'=>['horariogeneral.actualizar_puertas'], 'method'=>'POST'])!!}
                        <div class="col-xs-12 " >
                            <div class="col-xs-6">
                                <div class="col-xs-12">
                                    <h1>Puertas normales</h1>
                                </div>
                                @foreach($puertasNormales as $puertaNormal)

                                    <div class="col-xs-6">
                                        {!! Form::checkbox($puertaNormal->id, $puertaNormal->id,$puertaNormal->estatus_en_horario_general) !!}
                                        {!! Form::label($puertaNormal->nombre) !!}
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-xs-6">
                                <div class="col-xs-12">
                                    <h1>Puertas especiales</h1>
                                </div>

                                @foreach($puertasEspeciales as $puertaEspecial)
                                    <div class="col-xs-6">
                                        {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id,$puertaEspecial->estatus_en_horario_general) !!}
                                        {!! Form::label($puertaEspecial->nombre) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel-heading row">
                                <div class="col-md-6">
                                    {!!Form::submit('Actualizar',['class'=>'btn btn-info btn-block btn-3d col-xs-10'])!!}
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</a>
                                </div>
                            </div>
                        </div>

                    {!!Form::close()!!}

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

                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12 row center-xs panel-heading ">
                    <div class="col-xs-12">
                        {!!link_to_route('horariogeneral.create', 'Agregar intervalo', null, ['class'=>'btn btn-info btn-block btn-3d'])!!}
                    </div>
                </div>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>desde</th>
                        <th>hasta</th>
                        <th>dias</th>
                        <th>Eliminar</th>
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
                            <th>
                                {!!Form::open(['route'=>['horariogeneral.destroy',$intervaloHorarioGeneralAgrupado->dias[0]->id], 'method'=>'DELETE'])!!}
                                {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                                {!!Form::close()!!}
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/dataTables/js/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/dataTables/js/dataTables.bootstrap.js') !!}
    <script>
        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
        });
    </script>
@endsection