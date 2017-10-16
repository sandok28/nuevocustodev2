@extends('layouts.principal')
@section('titel')
    Show Horario del funcionario
@endsection
@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}

    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Datos del funcionario</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">

                @include('funcionarios.show')
                <div class="form-group">
                    <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                </div>

            </div>
        </div>
    </div>


    @if($funcionario->horario_normal == 0 )
        <div class="col-md-12">
            <div class="panel panel-solid-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Funcionario con horario de la empresa</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>

                    </div>
                </div>
            </div>
        </div>
        @include('horarios_generales.show_horario_general');
    @elseif($funcionario->horario_normal == 1 )
        <div class="col-md-12">
            <div class="panel panel-solid-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Funcionario con horario Propio</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('intervalos_funcionarios.index')
            </div>
        </div>
    @elseif($funcionario->horario_normal == 2 )
        <div class="col-md-12">
            <div class="panel panel-solid-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Funcionario con horario de acuerdo al cargo </h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>

                    </div>
                </div>
            </div>
        </div>
        @if($funcionario->cargo->estatus == 1 )
            @foreach($funcionario->cargo->secciones as $seccion)
                <div class="col-md-12">
                    @include('secciones.show')
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 1em;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3> El cargo "{{$funcionario->cargo->nombre }}" fue dado de baja.
                        Por favor realice una de estas acciones.</h3>
                    <h4>->Reactive el cargo "{{$funcionario->cargo->nombre }}".</h4>
                    <h4>->Asigne un cargo activo al funcionario.</h4>
                    <h4>->Asigne un horario especial, propio del funcionario.</h4>
                    <h4>->Asigne el horario general de la empresa  al funcionario.</h4>
                </div>
            </div>
            @endif
    @endif

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