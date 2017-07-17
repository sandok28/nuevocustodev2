@extends('layouts.principal')
@section('titel')
    editar invitado
@endsection
@section('titulo-tarjeta')
    editar invitado
@endsection
@section('content')
    {!!Form::model($invitado,['route'=>['invitados.update',$invitado],'method'=>'PUT'])!!}
        @include('invitados.forms.formulario')
        <div class="form-group">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!Form::close()!!}

    <div class="row">
        <div class="col-md-12">
            @include('intervalos.index')
        </div>
    </div>
@endsection