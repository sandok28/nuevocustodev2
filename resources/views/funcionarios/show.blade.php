@extends('layouts.principal')

@section('titel')
    Ver intervalo
@endsection

@section('titulo-tarjeta')
    Ver intervalo
@endsection

@section('content')
    <div class="form-group">
        {!!Form::label('Nombre','Nombre:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->nombre,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Apellido','Apellido:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->apellido,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Cedula','Cedula:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->cedula,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Celular','Celular:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->celular,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('fecha_nacimiento','Fecha de nacimiento:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->fecha_nacimiento,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Correo','Email:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->correo,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('tarjeta_rfid','Tarjeta RFID:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->tarjeta_rfid,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        {!!Form::label('Cargo','Cargo:')!!}
    </div>
    <div class="form-group">
        {!!Form::label($funcionario->cargo,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
    </div>
@endsection