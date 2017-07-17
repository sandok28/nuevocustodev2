@extends('layouts.principal')
@section('titel')
    agregar licencia
@endsection
@section('titulo-tarjeta')
    agregar licencia
@endsection
@section('content')
    <div>
        //aqui va el show del funcionario
    </div>
    <div>
        {!!Form::open(['route'=>['licencias.store',$funcionario->id], 'method'=>'POST'])!!}
            @include('licencias.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@endsection
