@extends('layouts.principal')

@section('title')
    Index Funcionarios
@endsection

@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

@section('content')
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
    <section id="main-content">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h1">CONTROL DE PUERTAS</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                       <div class="row form-group">
                            <div class="col-xs-12 ">
                                <div class="col-xs-12 row form-inline">
                                    <div class="col-xs-12">
                                        <h1>Puertas normales</h1>
                                    </div>
                                        <!--info puerta nomal-->
                                        @foreach($puertasNormales as $puertaNormal)
                                                {{$puertaNormal->nombre}}
                                                <img src="{{url('assets/img/puerta.gif')}}" alt class="img-responsive  form-inline">
                                                {!! Form::submit('Abrir Puerta',['class'=>'btn btn-primary','onclick'=>'abrirpuerta()']) !!}<br>
                                        @endforeach

                                </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-12 row form-inline">
                                            <h1>Puertas especiales</h1>
                                        </div>
                                        <!--info puerta especial-->
                                        @foreach($puertasEspeciales as $puertaEspecial)
                                            {{$puertaEspecial->nombre}}<br>
                                            <img src="{{url('assets/img/puerta.gif')}}" alt class="img-responsive img-rounded form-inline"><br>
                                            {!! Form::submit('Abrir Puerta',['class'=>'btn btn-primary','onclick'=>'abrirpuerta()']) !!}
                                        @endforeach
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/dataTables/js/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/dataTables/js/dataTables.bootstrap.js') !!}
    {!! Html::script('js/abrirpuerta.js') !!}
    <script>
        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
@endsection