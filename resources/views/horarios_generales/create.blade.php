@extends('layouts.principal')

@section('titel')
    agregar intervalo
@endsection
@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection
@section('content')
    <div>
        {!!Form::open(['route'=>['horariogeneral.store'], 'method'=>'POST'])!!}
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Seleccion intervalo de tiempo</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>

                    </div>
                </div>
                <div class="panel-body">
                    @include('horarios_generales.forms.formulario')
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
                </div>
            </div>
        </div>

        {!!Form::close()!!}
    </div>

@endsection

@section('cargarjs')
    <!--Page Level JS-->

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