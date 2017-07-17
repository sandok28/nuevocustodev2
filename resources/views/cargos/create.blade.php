@extends('layouts.principal')

@section('titel')
    agregar cargo
@endsection

@section('titulo-tarjeta')
    agregar cargo
@endsection
@section('content')
    <div>
        {!!Form::open(['route'=>['cargos.store',$seccion_id], 'method'=>'POST'])!!}
        @include('cargos.forms.formulario')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>
@endsection