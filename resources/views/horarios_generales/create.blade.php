@extends('layouts.principal')

@section('titel')
    agregar intervalo
@endsection

@section('titulo-tarjeta')
    agregar intervalo
@endsection
@section('content')
    <div>
        {!!Form::open(['route'=>['horariogeneral.store'], 'method'=>'POST'])!!}
            @include('horarios_generales.forms.formulario')
            <div class="col-md-12 row form-group">
                {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            </div>
        {!!Form::close()!!}
    </div>

@endsection