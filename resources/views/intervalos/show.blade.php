@extends('layouts.principal')

@section('titel')
    Ver intervalo
@endsection

@section('titulo-tarjeta')
    Ver intervalo
@endsection

@section('content')
    <div class="form-group">
        {!!Form::label('desde','Dede:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($intervalo->desde,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('hasta','Hasta:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($intervalo->hasta,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('targeta_rfid','Targeta RFID:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($intervalo->targeta_rfid,null,['class'=>'form-control','placeholder'=>'# targeta RFID'])!!}
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
    </div>

    <div class="row form-group">
        <div class="col-xs-12 row">
            <div class="col-xs-6">
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
            <div class="col-xs-6">
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

@endsection