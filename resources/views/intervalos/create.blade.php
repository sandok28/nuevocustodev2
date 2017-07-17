@extends('layouts.principal')

@section('titel')
    agregar intervalo
@endsection

@section('titulo-tarjeta')
    agregar intervalo
@endsection
@section('content')
    <div>
        {!!Form::open(['route'=>['intervalos.store',$invitado_id], 'method'=>'POST'])!!}
            @include('intervalos.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
            <div class="row form-group">
                <div class="col-xs-12 row">
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <h1>Puertas normales</h1>
                        </div>
                        @foreach($puertasNormales as $puertaNormal)
                            <div class="col-xs-4">
                                {!! Form::checkbox($puertaNormal->id, $puertaNormal->id) !!}
                                {!! Form::label($puertaNormal->nombre) !!}
                            </div>
                        @endforeach
                    </div>
                    <div class="col-xs-6">
                        <div class="col-xs-12">
                            <h1>Puertas especiales</h1>
                        </div>
                        @foreach($puertasEspeciales as $puertaEspecial)
                            <div class="col-xs-4">
                                {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id) !!}
                                {!! Form::label($puertaEspecial->nombre) !!}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>



        {!!Form::close()!!}
    </div>

@endsection