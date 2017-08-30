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