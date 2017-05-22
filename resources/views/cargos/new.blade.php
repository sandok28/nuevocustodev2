@extends('layouts.principal')
@section('title')
    Crear Cargos
@endsection
@section('content')

    <div>
        <p>Nuevo cargo para Seccion {{ $seccion_id }}</p>
    </div>
    <div>
        {!!Form::open(['route'=>['cargos.store',$seccion_id], 'method'=>'POST'])!!}
        @include('cargos.forms.formulario')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>


@endsection