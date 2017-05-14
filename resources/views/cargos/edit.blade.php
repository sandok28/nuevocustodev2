@extends('layouts.principal')

@section('title')
    Editar Cargos
@endsection
@section('content')
    {!!Form::model($cargo,['route'=>['cargos.update',$cargo],'method'=>'PUT'])!!}
    @include('cargos.forms.formulario')
    @if(($cargo->estatus) == 1)
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