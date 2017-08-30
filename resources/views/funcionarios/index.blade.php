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
                <h3 class="panel-title">Lista Funcionarios</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
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
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Cedula</th>
                                <th>Correo</th>
                                <th>Tarjeta RFID</th>
                                <th>Editar</th>

                            </tr>
                            </thead>
                        </table>
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
                "ajax": "/funcionarios-lista",

                "columns":[
                    {data: 'nombre'},
                    {data: 'apellido'},
                    {data: 'cedula'},
                    {data: 'correo'},
                    {data: 'tarjeta_rfid'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
            } );
        } );


        function Mostrar(btn)
        {
            console.log(btn.value);
        }

    </script>

@endsection