@extends('layouts.principal')

@section('titel')
    index Horario General
@endsection
@section('titulo-tarjeta')
    index Horario General
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

@section('content')
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Intervalos que del invitado </h3>

                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-12 row center-xs panel-heading ">
                            <div class="col-xs-12">
                                {!!link_to_route('horariogeneral.create', 'Agregar nuevo intervalo', null, ['class'=>'btn btn-info btn-block btn-3d'])!!}
                            </div>
                        </div>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <th>desde</th>
                                    <th>hasta</th>
                                    <th>dia</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($intervalosHorarioGeneral as $intervaloHorarioGeneral)
                                    <tr>
                                        <td>{{$intervaloHorarioGeneral->desde}}</td>
                                        <td>{{$intervaloHorarioGeneral->hasta}}</td>
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
                                        <th>
                                            {!!Form::open(['route'=>['horariogeneral.destroy',$intervaloHorarioGeneral], 'method'=>'DELETE'])!!}
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
        </div>
    </section>
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
@endsection