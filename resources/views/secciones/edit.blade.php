@extends('layouts.principal')

@section('title')
    Create Usuarios
@endsection
@section('content')
    {!!Form::model($seccion,['route'=>['secciones.update',$seccion],'method'=>'PUT'])!!}
    @include('secciones.forms.formulario')
    <div class="row form-group">
        <div class="col-xs-12 row">
            <div class="col-xs-6">
                <div class="col-xs-12">
                    <h1>Puertas normales</h1>
                </div>
                @foreach($puertasNormales as $puertaNormal)
                    <div class="col-xs-4">
                        {!! Form::checkbox($puertaNormal->id, $puertaNormal->id,$puertaNormal->pivot->estatus_permiso) !!}
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


                        {!! Form::checkbox($puertaEspecial->id, $puertaEspecial->id, $puertaEspecial->pivot->estatus_permiso) !!}
                        {!! Form::label($puertaEspecial->nombre) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if(($seccion->estatus) == 1)
        <div class="form-group">
            {{ Form::checkbox('estatus', '0',false),['class'=>'form-control'] }}
            {{ Form::label('dar de baja') }}
        </div>
    @else
        <div class="form-group">
            {{ Form::checkbox('estatus', '1',false),['class'=>'form-control'] }}
            {{ Form::label('Reactivar') }}
        </div>
    @endif

    <div class="form-group">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
    </div>
    {!!Form::close()!!}

    <div class="row">
        <div class="col-md-12">
            @include('cargos.index')
        </div>
    </div>
    <div class="col-xs-4">
        @foreach($seccion->puertas as $puerta)

            <p>{{$puerta->nombre}}</p>
        @endforeach
    </div>

@endsection