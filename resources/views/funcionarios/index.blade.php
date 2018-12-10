@extends('layouts.principal')

@section('title')
    Index Funcionarios
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection


@section('content')

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Gestión de funcionarios</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <section id="main-content">
                    <div class="col-md-12">
                        <div class="panel-heading row">
                            <div class="col-md-6">
                                {!!link_to_route('funcionarios.create', 'Agregar funcionario', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                                        <thead>
                                        <tr>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Cedula</th>
                                            <th>Correo</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Funcionarios inactivos</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table id="example1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Cedula</th>
                                            <th>Correo</th>
                                            <th>Editar</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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
            $('#example').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('gridfuncioarios')}}",

                "columns":[
                    {data: 'nombre'},
                    {data: 'apellido'},
                    {data: 'cedula'},
                    {data: 'correo'},
                    {data: 'estatus', render: function (data) {
                        if(data==1){return "activo";}
                        else {return "inactivo";}
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
            } );
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('#example1').DataTable( {
                "processing": true,
                "serverSide": true,
                "ajax": "{{route('listar_funcionarios_inactivos')}}",

                "columns":[
                    {data: 'nombre'},
                    {data: 'apellido'},
                    {data: 'cedula'},
                    {data: 'correo'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            } );
        } );
    </script>
@endsection