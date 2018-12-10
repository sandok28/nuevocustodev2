@extends('layouts.principal')

@section('titel')
    index licencias
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

@section('content')

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Lista de las licencias activas</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <section id="main-content">
                    <div class="col-md-12">
                        <div class="panel-heading row">
                            <div class="col-md-6">
                                {!!link_to_route('funcionarios.index', 'Agregar licenca', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                            </div>
                        </div>
                    </div>
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Funcionario </th>
                                <th>Cargo</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>Vigencia</th>
                                <th>Restan</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($licenciasActivas as $licenciaActiva)
                                <tr>
                                    <th>{{$licenciaActiva->funcionario->nombre}}</th>
                                    <th>{{$licenciaActiva->funcionario->cargo->nombre}}</th>
                                    <th>{{$licenciaActiva->desde}}</th>
                                    <th>{{$licenciaActiva->hasta}}</th>
                                    <th>{{$licenciaActiva->vigencia+1}} Dias</th>
                                    <th>{{$licenciaActiva->restante+1}} Dias</th>

                                    @if($licenciaActiva->en_curso == 0)
                                        <th>{!!link_to_route('licencias.edit', $title = 'Editar', $parameters = $licenciaActiva, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                                        <th>
                                            {!!Form::open(['route'=>['licencias.destroy',$licenciaActiva], 'method'=>'DELETE'])!!}
                                            {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                                            {!!Form::close()!!}
                                        </th>
                                    @else
                                        <th>{!!link_to_route('licencias.edit_en_curso', 'En curso',$parameters = $licenciaActiva, ['class'=>'btn btn-info'])!!}</th>
                                        <th>
                                            {!!Form::open(['route'=>['licencias.destroy_en_curso',$licenciaActiva], 'method'=>'DELETE'])!!}
                                            {!!Form::submit('Concluir',['class'=>'btn btn-warning'])!!}
                                            {!!Form::close()!!}
                                        </th>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                </section>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="panel-title">Licencias caducadas</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">

                    <thead>
                    <tr>
                        <th>Funcionario</th>
                        <th>Cedula</th>
                        <th>Cargo</th>
                        <th>Desde</th>
                        <th>Hasta</th>
                        <th>Total dias</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($licenciasConcluidas as $licenciaConcluida)
                        <tr>
                            <th>{{$licenciaConcluida->funcionario->nombre}}</th>
                            <th>{{$licenciaConcluida->funcionario->cedula}}</th>
                            <th>{{$licenciaConcluida->funcionario->cargo->nombre }}</th>
                            <th>{{$licenciaConcluida->desde}}</th>
                            <th>{{$licenciaConcluida->hasta}}</th>
                            <th>{{$licenciaConcluida->vigencia+1}} Dias</th>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
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
    <script>
        $(document).ready(function() {
            $('#example2').dataTable();
        });
    </script>

@endsection