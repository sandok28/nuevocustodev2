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
                       <div class="form-group">
                           <div class="row">
                               <div class="col-xs-12">
                                   <h1>Puertas normales</h1>
                               </div>

                               <!--info puerta nomal-->
                               <div class="row">
                                   @foreach($puertasNormales as $puertaNormal)
                                       <div class="col-md-3">
                                           {{$puertaNormal->nombre}}
                                           <img src="{{url('assets/img/puerta.gif')}}" alt class="img-responsive  form-inline">
                                           {!! Form::submit('Abrir Puerta',['class'=>'btn btn-primary','onclick'=>'abrirpuerta()']) !!}<br>
                                       </div>
                                       @endforeach
                               </div>

                               <div class="row">
                                   <div class="col-xs-12 row">
                                       <h1>Puertas especiales</h1>
                                   </div>
                                   <!--info puerta especial-->
                                   @foreach($puertasEspeciales as $puertaEspecial)
                                       <div class="col-md-3">
                                       {{$puertaEspecial->nombre}}<br>
                                       <img src="{{url('assets/img/puerta.gif')}}" alt class="img-responsive img-rounded form-inline"><br>
                                       {!! Form::submit('Abrir Puerta',['class'=>'btn btn-primary','onclick'=>'abrirpuerta()']) !!}
                                       </div>
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