@extends('layouts.principal')

@section('titel')
    index licencias
@endsection
@section('titulo-tarjeta')
    index licencias
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

@section('content')
    <section id="main-content">
        <div class="col-md-12">
            <div class="panel-heading row">
                <div class="col-md-6">
                    {!!link_to_route('licencias.create', 'Agregar licenca', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tabla licencias activas </h3>

                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <th>Funcionario </th>
                                    <th>Cedula</th>
                                    <th>Cargo</th>
                                    <th>Desde</th>
                                    <th>Hasta</th>
                                    <th>Vigencia</th>
                                    <th>Dias restante</th>
                                    <th>Editar</th>

                                 </tr>
                            </thead>
                            <tbody>
                            @foreach($licenciasActivas as $licenciaActiva)
                                <tr>
                                    <th>{{$licenciaActiva->funcionario->nombre}}</th>
                                    <th>{{$licenciaActiva->funcionario->cedula}}</th>
                                    <th>{{$licenciaActiva->funcionario->cargo->nombre}}</th>
                                    <th>{{$licenciaActiva->desde}}</th>
                                    <th>{{$licenciaActiva->hasta}}</th>
                                    <th>{{$licenciaActiva->vigencia}}</th>
                                    <th>{{$licenciaActiva->restante }}</th>
                                    <th>{!!link_to_route('licencias.edit', $title = 'Editar', $parameters = $licenciaActiva, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tabla licencias concluidas </h3>

                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>Total dias</th>
                                <th>Funcionario</th>
                                <th>Cedula</th>
                                <th>Cargo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($licenciasConcluidas as $licenciaConcluida)
                                <tr>
                                    <th>{{$licenciaConcluida->desde}}</th>
                                    <th>{{$licenciaConcluida->hasta}}</th>
                                    <th>{{$licenciaConcluida->vigencia}}</th>
                                    <th>{{$licenciaConcluida->funcionario->nombre}}</th>
                                    <th>{{$licenciaConcluida->funcionario->cedula}}</th>
                                    <th>{{$licenciaConcluida->funcionario->cargo->nombre }}</th>
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