@extends('layouts.principal')

@section('content')
    {!!Form::model($puerta,['route'=>['GestionAreas.update',$puerta],'method'=>'PUT'])!!}
    @include('GestionAreas.forms.formulario')
    <div class="form-group">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@endsection