@extends('layouts.principal')

@section('titel')
    index Horario General
@endsection


@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}

    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Horario general de la empresa</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="panel-heading row">
                        <div class="col-md-6">
                            {!!link_to_route('horariogeneral.index', 'Editar horario heneral', null,['class'=>'btn btn-info btn-block btn-3d'])!!}

                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('horarios_generales.show_horario_general')
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
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
        });
    </script>
@endsection