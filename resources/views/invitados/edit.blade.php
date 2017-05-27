@extends('layouts.principal')

@section('content')
    {!!Form::model($funcionario,['route'=>['funcionarios.update',$funcionario],'method'=>'PUT'])!!}
    @include('funcionarios.forms.formulario')
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