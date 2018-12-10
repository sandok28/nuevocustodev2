@extends('layouts.principal')

@section('title')
    Index Funcionarios
@endsection


@section('content')

    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">CONTROL DE PUERTAS</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">
                <section id="main-content">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <!--info puerta nomal-->
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h1 style="margin-top: 0px; text-align: center;">Puertas normales</h1>
                                        </div>
                                        @foreach($puertasNormales as $puertaNormal)
                                            @if($puertaNormal->pivot->estatus_permiso == 1)
                                                <div class="col-md-2"  style="text-align: center;">
                                                    {{$puertaNormal->nombre}}
                                                    <img src="{{url('assets/img/puerta.png')}}" alt class="img-responsive  form-inline" style="width: 100%;">
                                                    {!! Form::submit('Abrir Puerta',['class'=>'btn btn-primary btn-block','onclick'=>"abrirpuerta(".$puertaNormal->ip.")"]) !!}<br>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h1 style="text-align: center;">Puertas especiales</h1>
                                        </div>
                                        <!--info puerta especial-->
                                        @foreach($puertasEspeciales as $puertaEspecial)
                                            @if($puertaEspecial->pivot->estatus_permiso == 1)
                                                <div class="col-md-2"  style="text-align: center;">
                                                    {{$puertaEspecial->nombre}}
                                                    <img src="{{url('assets/img/puerta.png')}}" alt class="img-responsive img-rounded form-inline" style="width: 100%;">
                                                    {!! Form::submit('Abrir Puerta',['class'=>'btn btn-primary btn-block','onclick'=>'abrirpuerta()']) !!}
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script>
        function abrirpuerta(ip) {
            alert(ip);
        }
    </script>

@endsection
