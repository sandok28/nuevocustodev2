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
                <h3 class="panel-title">GESTION DE AREAS</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
                {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="h1">GESTION DE AREAS</h1>
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
                                            <th>Dado de Baja</th>
                                            <th>Puerta Especial</th>
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
                "ajax": "/puertas-listar",

                "columns":[
                    {data: 'nombre'},
                    {data: 'llave_rfid'},
                    {data: 'ip'},
                    {data: 'estatus',
                    render: function(data){
                        if (data==1){return "Activo";}
                        else{return "Inactivo"}
                    }},
                    {data: 'puerta_especial',
                     render:function(data){
                        if(data==1){return "PUERTA ESPECILA"}
                        else{return "PUERTA NORMAL"}
                     }},
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                ]
            } );
        } );
    </script>
@endsection