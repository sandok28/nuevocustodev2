@extends('layouts.principal')

@section('titel')
    editar sección
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}

    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Editar sección</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                {!!Form::model($seccion,['route'=>['secciones.update',$seccion],'method'=>'PUT'])!!}
                @include('secciones.forms.formulario')

                <div class="col-xs-2" style="margin-top: 0.5em;">
                    @if(($seccion->estatus) == 1)
                        <div class="form-group">
                            {{ Form::checkbox('estatus', '0',false),['class'=>'form-control'] }}
                            {{ Form::label('dar de baja') }}
                        </div>
                    @else
                        <div class="form-group">
                            {{ Form::checkbox('estatus', '1',false),['class'=>'form-control'] }}
                            {{ Form::label('Reactivar') }}
                        </div>
                    @endif
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 row">
                        <div class="col-xs-6">
                            <div class="col-xs-12">
                                <h1>Puertas normales</h1>
                            </div>
                            @foreach($puertasNormales as $puertaNormal)
                                <div class="col-xs-6">
                                    {!! Form::checkbox($puertaNormal->id, $puertaNormal->id,$puertaNormal->estatus_permiso) !!}
                                    {!! Form::label($puertaNormal->nombre) !!}
                                </div>
                            @endforeach
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-12">
                                <h1>Puertas especiales</h1>
                            </div>

                            @foreach($puertasEspeciales as $puertaEspecial)
                                <div class="col-xs-6">
                                    {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id, $puertaEspecial->estatus_permiso) !!}
                                    {!! Form::label($puertaEspecial->nombre) !!}
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

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Cargos asociados a esta sección</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                @include('cargos.index_seccion')

            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Puertas e intervalos de tiempo de la sección</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">

                <div class="col-md-12">
                    <div class="panel panel-solid-danger">
                        <div class="panel-heading">
                            <h3 class="panel-title">Puertas activas para esta sección</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>

                            </div>
                        </div>
                        <div class="panel-body" style="padding-top: 0em;">
                            <div class="row form-group">
                                <div class="col-xs-12 row">
                                    <div class="col-xs-6">
                                        <div class="col-xs-12">
                                            <h1 style="margin-top: 0em;">Puertas normales</h1>
                                        </div>
                                        @foreach($puertasNormalesActivas as $puertaNormalActiva)
                                            @if($puertaNormalActiva->pivot->estatus_permiso == 1  )
                                                <div class="col-xs-6">
                                                    {!! Form::checkbox('asd', 'asd',1, ['disabled'=>'true']) !!}
                                                    {!! Form::label($puertaNormalActiva->nombre) !!}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-12">
                                            <h1 style="margin-top: 0em;">Puertas especiales</h1>
                                        </div>
                                        @foreach($puertasEspecialesActivas as $puertaEspecialActiva)
                                            @if($puertaEspecialActiva->pivot->estatus_permiso == 1  )
                                                <div class="col-xs-6">
                                                    {!! Form::checkbox('asd', 'asd',1,['disabled'=>'true']) !!}
                                                    {!! Form::label($puertaEspecialActiva->nombre) !!}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('intervalos_secciones.index')
            </div>
        </div>
    </div>
@endsection


@section('cargarjs')
    <!--Page Level JS-->
    {!! Html::script('assets/plugins/dataTables/js/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/dataTables/js/dataTables.bootstrap.js') !!}
    <script>
        $(document).ready(function() {
            $('#example').dataTable();
        });
        $(document).ready(function() {
            $('#example2').dataTable();
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