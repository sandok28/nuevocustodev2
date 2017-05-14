@extends('layouts.principal')
@section('title')
    Crear Cargos
@endsection
@section('content')

    <div>
        <p>CREAR CARGO</p>

    </div>
    <div>

        {!!Form::open(['route'=>'cargos.store', 'method'=>'POST'])!!}
            @include('cargos.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>


@endsection