@extends('layouts.principal')

@section('content')

    <div>
        <p>CREAR USUARIO</p>

    </div>
    <div>
         {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST'])!!}
            @include('usuarios.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>


@endsection