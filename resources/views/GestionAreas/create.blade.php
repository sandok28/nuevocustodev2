@extends('layouts.principal')

@section('content')

    <div>
        <p>CREAR USUARIO</p>

    </div>
    <div>
         {!!Form::open(['route'=>'puertas.store', 'method'=>'POST'])!!}
            @include('GestionAreas.forms.formulario')
        <div>
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        </div>
        {!!Form::close()!!}
    </div>


@endsection
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('js/generarllave.js') !!}
@endsection