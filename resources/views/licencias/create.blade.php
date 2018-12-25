@extends('layouts.principal')
@section('titel')
    agregar licencia
@endsection

@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
    {!! Html::style("bootstrap-datepicker/css/bootstrap-datepicker.min.css") !!}

@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Crear Licencia</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">
                <div>
                    {!!Form::open(['route'=>['licencias.store',$funcionario->id], 'method'=>'POST'])!!}
                    @include('licencias.forms.formulario')
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
            </div>
        </div>
    </div>



@endsection
@section('cargarjs')
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
