@extends('layouts.principal')

@section('content')
    {!!Form::model($puerta,['route'=>['puertas.update',$puerta],'method'=>'PUT'])!!}
    @include('GestionAreas.forms.formulario')
    <div class="form-group">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}
@endsection
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('js/generarllave.js') !!}
@endsection