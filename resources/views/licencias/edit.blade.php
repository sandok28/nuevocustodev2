@extends('layouts.principal')
@section('titel')
    editar licencia
@endsection
@section('titulo-tarjeta')
    editar licencia
@endsection
@section('content')
    <div>
        //aqui va el show del funcionario
    </div>
    {!!Form::model($licencia,['route'=>['licencias.update',$licencia],'method'=>'PUT'])!!}
        @include('licencias.forms.formulario')
        <div class="form-group">
            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
        </div>
    {!!Form::close()!!}

@endsection