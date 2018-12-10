@extends('layouts.principal')
@section('titel')
    editar usuario
@endsection
@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Editar usuario</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                {!!Form::model($usuario,['route'=>['usuarios.update',$usuario],'method'=>'PUT'])!!}
                @include('usuarios.forms.formulario')
                @if(($usuario->estatus) == 1)
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
                <div class="row form-group">
                    <div class="col-xs-12 row">
                        <div class="col-xs-6">
                            <div class="col-xs-12">
                                <h1>Puertas</h1>
                            </div>
                            <div class="col-xs-12">
                                @if($usuario->puertas->where('estatus','1')->count('id')==0)
                                    <div class="alert alert-danger alert-dismissible" role="alert" style="margin-bottom: 1em;">
                                        No hay puertas activas.
                                    </div>
                                @endif
                                @foreach($usuario->puertas->where('estatus','1') as $puertasPermisos)
                                    <div class="col-xs-8">
                                        {!! Form::checkbox($puertasPermisos->id, $puertasPermisos->id,$puertasPermisos->pivot->estatus_permiso) !!}
                                        {!! Form::label($puertasPermisos->nombre) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-12">
                                <h1>Roles</h1>
                            </div>
                            @foreach($usuario->permisos as $permisosUsuario)
                                <div class="col-xs-8">
                                    {!! Form::checkbox($permisosUsuario->id +10000, $permisosUsuario->id, $permisosUsuario->pivot->estatus_permiso) !!}
                                    {!! Form::label($permisosUsuario->nombre) !!}
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

    <script src="assets/plugins/icheck/js/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
        });
    </script>
@endsection