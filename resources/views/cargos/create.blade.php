@extends('layouts.principal')

@section('titel')
    agregar cargo
@endsection

@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Crear Cargo</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div>
                    {!!Form::open(['route'=>'cargos.store', 'method'=>'POST'])!!}
                    @include('cargos.forms.formulario')

                    <div class="col-md-12">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Seleccione las secciones al que pertence el cargo</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>

                                </div>
                            </div>
                            <div class="panel-body">
                                @foreach($secciones as $seccion)
                                    <div class="col-xs-4">
                                        {!! Form::checkbox($seccion->id, $seccion->id) !!}
                                        {!! Form::label($seccion->nombre) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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

