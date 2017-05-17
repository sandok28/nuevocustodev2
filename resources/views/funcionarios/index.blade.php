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
                <h1 class="h1">FUNCIONARIOS</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cedula</th>
                                    <th>Correo</th>
                                    <th>Tarjeta RFID</th>
                                    <th>Editar</th>
                                 </tr>
                            </thead>
                            <tbody>
                            @foreach($funcionarios as $funcionario)
                                <tr>
                                    <th>{{$funcionario->nombre}}</th>
                                    <th>{{$funcionario->apelido}}</th>
                                    <th>{{$funcionario->cedula}}</th>
                                    <th>{{$funcionario->correo}}</th>
                                    <th>{{$funcionario->tarjeta_rfid}}</th>
                                    <th>{!!link_to_route('funcionarios.edit', $title = 'Editar', $parameters = $funcionario, $attributes = ['class'=>'btn btn-primary'])!!}</th>
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
                    {!!link_to_route('funcionarios.create', 'Agregar funcionarios', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
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