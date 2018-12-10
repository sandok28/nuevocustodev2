@extends('layouts.principal')

@section('title')
    Index Usuarios
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection
@section('titel')
    index usuarios
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Lista Usuarios</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-heading row">
                                <div class="col-md-6">
                                    {!!link_to_route('usuarios.create', 'Agregar Usuario', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                                </div>
                            </div>
                        </div>
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
                        </table>

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
                "ajax": "{{route('lista-usuarios')}}",

                "columns":[
                    {data: 'name'},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                    {data: 'estatus',render:function (data) {
                        if(data==1){return "Activo"}
                        else {return "Inactivo"}
                    }},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            } );
        } );
    </script>
@endsection