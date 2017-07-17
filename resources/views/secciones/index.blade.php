@extends('layouts.principal')

@section('titel')
    index secciones
@endsection

@section('titulo-tarjeta')
    index secciones
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

@section('content')
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-heading row">
                    <div class="col-md-6">
                        {!!link_to_route('secciones.create', 'Agregar Seccion', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tabla seccioes </h3>

                        <div class="actions pull-right">
                            <i class="fa fa-chevron-down"></i>
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Creado</th>
                                    <th>Actualizado</th>
                                    <th>estatus</th>
                                    <th>editar</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($secciones as $seccion)
                                    <tr>
                                        <td>{{$seccion->nombre}}</td>

                                        <td>{{$seccion->created_at}}</td>
                                        <td>{{$seccion->updated_at}}</td>
                                        @if(($seccion->estatus) == 1)
                                            <th>activo</th>
                                        @else
                                            <th>inactivo</th>
                                        @endif
                                        <th>{!!link_to_route('secciones.edit', $title = 'Editar', $parameters = $seccion, $attributes = ['class'=>'btn btn-primary'])!!}</th>
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
    <script>

    </script>
@endsection