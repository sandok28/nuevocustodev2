@extends('layouts.principal')

@section('titel')
    Ver intervalo del horarios especial
@endsection

@section('titulo-tarjeta')
    Ver intervalo del horarios especial
@endsection

@section('content')
    <div class="form-group">
        {!!Form::label('desde','Dede:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($intervaloEspecial->desde,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('hasta','Hasta:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($intervaloEspecial->hasta,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('dia','Dia:')!!}
    </div>
    <div class="form-group">
        @if($intervaloEspecial->dia == 1)
            {!!Form::label('Lunes',null,['class'=>'form-control'])!!}
        @elseif($intervaloEspecial->dia == 2)
            {!!Form::label('Martes',null,['class'=>'form-control'])!!}
        @elseif($intervaloEspecial->dia == 3)
            {!!Form::label('Miercoles',null,['class'=>'form-control'])!!}
        @elseif($intervaloEspecial->dia == 4)
            {!!Form::label('Jueves',null,['class'=>'form-control'])!!}
        @elseif($intervaloEspecial->dia == 5)
            {!!Form::label('Viernes',null,['class'=>'form-control'])!!}
        @elseif($intervaloEspecial->dia == 6)
            {!!Form::label('Sabado',null,['class'=>'form-control'])!!}
        @elseif($intervaloEspecial->dia == 7)
            {!!Form::label('Domingo',null,['class'=>'form-control'])!!}
        @endif

    </div>


    <div class="row form-group">
        <div class="col-xs-12 row">
            <div class="row col-xs-6">
                <div class="col-xs-12">
                    <h1>Puertas normales</h1>
                </div>
                @foreach($puertasNormales as $puertaNormal)
                    <div class="col-xs-4">
                        {!! Form::checkbox($puertaNormal->id, $puertaNormal->id,1,['disabled'=> true]) !!}
                        {!! Form::label($puertaNormal->nombre) !!}
                    </div>
                @endforeach
            </div>
            <div class="row col-xs-6">
                <div class="col-xs-12">
                    <h1>Puertas especiales</h1>
                </div>
                @foreach($puertasEspeciales as $puertaEspecial)
                    <div class="col-xs-4">
                        {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id, 1,['disabled'=> true]) !!}
                        {!! Form::label($puertaEspecial->nombre) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
    </div>

@endsection