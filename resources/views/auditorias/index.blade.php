@extends('layouts.principal')
@section('title')
    Index Auditorias
@endsection
@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection
@section('titel')
    Index auditorias.
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Listado de  Auditadas</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <section id="main-content">
                    <div class="row">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Usiario</th>
                                <th>Evento</th>
                                <th>Valores Anteriores</th>
                                <th>Valores Actuales</th>
                                <th>Direccion Ip</th>
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
                "ajax": "{{route('listarAuditorias')}}",

                "columns":[
                    {data: 'user_id'},
                    {data: 'event'},
                    {data: 'old_values'},
                    {data: 'new_values'},
                    {data: 'ip_address'}
                ]
            } );
        } );
    </script>
@endsection