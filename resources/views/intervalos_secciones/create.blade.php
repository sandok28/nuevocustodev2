@extends('layouts.principal')

@section('titel')
    Horario Especial Agregar intervalo de tiempo
@endsection

@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> Horario especial de la sección, agregar intervalo </h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div>
                    {!!Form::open(['route'=>['IntervalosSecciones.store',$seccion_id], 'method'=>'POST'])!!}
                    @include('intervalos_funcionarios.forms.formulario')

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
    <!--Page Leve JS -->
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