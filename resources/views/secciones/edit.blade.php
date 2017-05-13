@extends('layouts.principal')

@section('title')
    Create Usuarios
@endsection
@section('content')
    {!!Form::model($seccion,['route'=>['secciones.update',$seccion],'method'=>'PUT'])!!}
    @include('secciones.forms.formulario')
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

    <div class="form-group">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}

    <div class="row">
        <div class="col-md-12">
            @include('cargos.index')
        </div>
    </div>
@endsection