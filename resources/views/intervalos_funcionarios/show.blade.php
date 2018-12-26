@extends('layouts.principal')

@section('titel')
    Ver intervalo del horarios especial
@endsection

@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
@endsection
@section('content')
    <div class="col-md-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Vista detallada del intervalo</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
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
                    <label for="Lunes" class="form-control">
                        @foreach($intervaloEspecial->dias as $dia)
                            @if($dia->dia == 1)
                                Lunes
                            @elseif($dia->dia == 2)
                                Martes
                            @elseif($dia->dia == 3)
                                Miercoles
                            @elseif($dia->dia == 4)
                                Jueves
                            @elseif($dia->dia == 5)
                                Viernes
                            @elseif($dia->dia == 6)
                                Sabado
                            @elseif($dia->dia == 7)
                                Domingo
                            @endif
                        @endforeach
                    </label>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 row">
                        <div class="row col-xs-6">
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
                        <div class="row col-xs-6">
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
                <div class="form-group">
                    <button class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
        });
    </script>
@endsection