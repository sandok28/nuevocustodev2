@extends('layouts.principal')
@section('titel')
    Crear Funcionarios
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
    {!! Html::style('assets/plugins/sweetalert/dist/sweetalert.css') !!}
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
    {!! Html::style("bootstrap-datepicker/css/bootstrap-datepicker.min.css") !!}


@endsection

@section('content')

    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Agregar Funcionario</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">
                <div>

                    {!!Form::open(['route'=>'funcionarios.store', 'method'=>'POST'])!!}
                    @include('funcionarios.forms.formulario_crear')
                    <div class="col-md-12">
                        <div class="panel-heading row">
                            <div class="col-md-6">
                                {!!Form::submit('Registrar',['class'=>'btn btn-info btn-block btn-3d col-xs-10'])!!}
                            </div>
                            <div class="col-md-6">
                                <a class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</a>
                            </div>
                        </div>
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('cargarjs')
    {!! Html::script("assets/plugins/sweetalert/dist/sweetalert.min.js") !!}
    {!! Html::script("assets/plugins/icheck/js/icheck.min.js") !!}
    {!! Html::script("assets/plugins/validation/js/jquery.validate.min.js") !!}
    {!! Html::script("bootstrap-datepicker/js/bootstrap-datepicker.min.js") !!}
    {!! Html::script("bootstrap-datepicker/js/datepicker-es.js") !!}


    <script>
        //
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            language: 'es'
        });

    </script>

@endsection