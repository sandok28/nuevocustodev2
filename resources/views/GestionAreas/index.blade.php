@extends('layouts.principal')

@section('title')
    Index Funcionarios
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

@section('content')
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1">GESTION DE AREAS</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                            <tr>
                                <th>Modulo</th>
                                <th>Llave</th>
                                <th>Ip</th>
                                <th>Editar</th>
                                <th>Dado de Baja</th>
                                <th>Puerta Especial</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($puertas as $puerta)
                                <tr>
                                    <th>{{$puerta->nombre}}</th>
                                    <th>{{$puerta->llave_rfid}}</th>
                                    <th>{{$puerta->ip}}</th>
                                    <th>{!!link_to_route('puertas.edit', $title = 'Editar', $parameters = $puerta, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                                    @if(($puerta->estatus)==1)
                                        <th>Activo</th>
                                    @else
                                        <th>Inactivo</th>
                                    @endif
                                    @if(($puerta->puerta_especial)==1)
                                        <th>PUERTA ESPECIAL</th>
                                    @else
                                        <th>PUERTA NORMAL</th>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="panel-heading row">
                <div class="col-md-6">
                    {!!link_to_route('puertas.create', 'Agregar Puertas', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
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