@extends('layouts.principal')

@section('title')
    Create Usuarios
@endsection
@section('content')
    {!!Form::model($usuario,['route'=>['usuarios.update',$usuario],'method'=>'PUT'])!!}
    @include('usuarios.forms.formulario')
    <div class="row form-group">
        <div class="col-xs-12 row">
            <div class="col-xs-4">
                <div class="col-xs-12">
                    <h1>Control Pertas</h1>
                </div>
                @foreach($usuario->puertas as $puertaNormal)
                    <div class="col-xs-8">
                        {!! Form::checkbox($puertaNormal->id, $puertaNormal->id,$puertaNormal->pivot->estatus_permiso) !!}
                        {!! Form::label($puertaNormal->nombre) !!}
                    </div>
                @endforeach
            </div>
            <div class="col-xs-8">
                <div class="col-xs-12">
                    <h1>Permisos de ROL</h1>
                </div>

                @foreach($usuario->permisos as $puertaEspecial)
                    <div class="col-xs-8">
                        {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id, $puertaEspecial->pivot->estatus_permiso) !!}
                        {!! Form::label($puertaEspecial->nombre) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
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

    <div class="form-group">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@endsection