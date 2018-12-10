@extends('layouts.principal')

@section('titel')
    index secciones
@endsection


@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Gestión de secciones</h3>
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
                                    {!!link_to_route('secciones.create', 'Agregar seccion', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
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
                                <th>Estado</th>
                                <th>Editar</th>

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
                "ajax": "{{route('gridsecciones')}}",

                "columns":[
                    {data: 'nombre'},
                    {data: 'estatus',
                    render: function (data) {
                        if(data==1){return "Activa"}
                        else{return "Inactiva"}
                    }
                    },
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            } );
        } );
    </script>
@endsection