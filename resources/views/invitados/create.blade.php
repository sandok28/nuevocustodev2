@extends('layouts.principal')
@section('titel')
    agregar invitado
@endsection
@section('titulo-tarjeta')
    agregar invitado
@endsection
@section('content')
    <div>
        {!!Form::open(['route'=>'invitados.store', 'method'=>'POST'])!!}
            @include('invitados.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>

@endsection
