@extends('layouts.principal')
@section('titel')
    Editar Horario del funcionario
@endsection
@section('titulo-tarjeta')
    Editar Horario del funcionario
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {!!Form::label('Nombre','Nombre:')!!}
                {!!Form::label($funcionario->nombre,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Apellido','Apellido:')!!}
                {!!Form::label($funcionario->apelido,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Cedula','Cedula:')!!}
                {!!Form::label($funcionario->cedula,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Celular','Celular:')!!}
                {!!Form::label($funcionario->celular,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {!!Form::label('fecha_nacimiento','Fecha de nacimiento:')!!}
                {!!Form::label($funcionario->fecha_nacimiento,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Correo','Email:')!!}
                {!!Form::label($funcionario->correo,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('tarjeta_rfid','Tarjeta RFID:')!!}
                {!!Form::label($funcionario->tarjeta_rfid,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>
            <div class="form-group">
                {!!Form::label('Cargo','Cargo:')!!}
                {!!Form::label($funcionario->cargo->nombre,null,['class'=>'form-control','placeholder'=>'hh:mm:ss'])!!}
            </div>
        </div>
    </div>


    <div class="form-group">
        <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('horarios.index')
        </div>
    </div>
@endsection
