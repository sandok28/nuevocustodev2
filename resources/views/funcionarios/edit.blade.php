@extends('layouts.principal')

@section('content')
    {!!Form::model($funcionario,['route'=>['funcionarios.update',$funcionario],'method'=>'PUT'])!!}
    @include('funcionarios.forms.formulario')
    <div class="form-group">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@endsection