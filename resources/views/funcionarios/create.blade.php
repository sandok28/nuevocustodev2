@extends('layouts.principal')

@section('content')

    <div>
        <p>CREAR FUNCIONARIO</p>
    </div>
    <div>
        {!!Form::open(['route'=>'funcionarios.store', 'method'=>'POST'])!!}
            @include('funcionarios.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>


@endsection