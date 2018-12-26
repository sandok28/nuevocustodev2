@extends('layouts.principal')

@section('titel')
    Ver intervalo
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Vista intervalo</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div class="form-group col-md-12">
                    <div class="form-group col-md-6">
                        {!!Form::label('desde','Dede:')!!}
                        {!!Form::label($intervalo->desde,null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group col-md-6">
                        {!!Form::label('hasta','Hasta:')!!}
                        {!!Form::label($intervalo->hasta,null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group col-md-6">
                        {!!Form::label('Fecha','Fecha:')!!}
                        {!!Form::label($intervalo->fecha,null,['class'=>'form-control'])!!}
                    </div>
                    <div class="form-group col-md-6">
                        {!!Form::label('targeta_rfid','Targeta RFID:')!!}
                        {!!Form::label($intervalo->targeta_rfid,null,['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                </div>

                <div class="row">
                    <div class="col-xs-12 row">
                        <div class="col-xs-6">
                            <div class="col-xs-12">
                                <h1>Puertas normales</h1>
                            </div>
                            @foreach($puertasNormales as $puertaNormal)
                                <div class="col-xs-6">
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
                                <div class="col-xs-6">
                                    {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id, 1,['disabled'=> true]) !!}
                                    {!! Form::label($puertaEspecial->nombre) !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection