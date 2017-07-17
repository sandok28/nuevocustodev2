@extends('layouts.principal')
@section('titel')
    agregar usuario
@endsection
@section('titulo-tarjeta')
    agregar usuario
@endsection
@section('content')
    <div>
         {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST'])!!}
            @include('usuarios.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@endsection