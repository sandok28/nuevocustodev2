@extends('layouts.principal')

@section('titel')
    editar cargo
@endsection

@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Editar Cargo</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                {!!Form::model($cargo,['route'=>['cargos.update',$cargo],'method'=>'PUT'])!!}
                @include('cargos.forms.formulario')
                <div class="col-md-12">

                        @if(($cargo->estatus) == 1)
                            <div class="col-md-2" style="margin: 1em;">
                                <div class="form-group">
                                    {{ Form::checkbox('estatus', '0',false),['class'=>'form-control'] }}
                                    {{ Form::label('dar de baja') }}
                                </div>
                            </div>
                        <div class="col-md-7">
                            <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 1em;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Si da de baja el cargo "{{$cargo->nombre}}"  {{$num_funcionarios}} funcionarios perderan acceso en las secciones.
                            </div>
                        </div>
                        @else
                            <div class="form-group">
                                {{ Form::checkbox('estatus', '1',false),['class'=>'form-control'] }}
                                {{ Form::label('Reactivar') }}
                            </div>
                        @endif
                    <br>
                </div>



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
                                    {!! Form::checkbox($seccion->id, $seccion->id,$seccion->estatus_permiso) !!}
                                    {!! Form::label($seccion->nombre) !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel-heading row">
                        <div class="col-md-6">
                            {!!Form::submit('Actualizar',['class'=>'btn btn-info btn-block btn-3d col-xs-10'])!!}
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