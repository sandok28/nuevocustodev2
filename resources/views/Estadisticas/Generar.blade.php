<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 26/07/2017
 * Time: 9:25 AM
 */
?>

@extends('layouts.principal')
@section('titel')
        Generar Estadisticas
@endsection


@section('cargarcss')
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
    {!! Html::style("bootstrap-datepicker/css/bootstrap-datepicker.min.css") !!}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> Uso de las puertas </h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
                <div class="panel-body">
                    {!!Form::open(['route'=>['estadisticas.graficas'], 'method'=>'POST'])!!}
                        @include('Estadisticas.forms.formulario')
                        <div class="col-md-12">
                            <div class="panel-heading row">
                                <div class="col-md-6">
                                    {!!Form::submit('Consultar',['class'=>'btn btn-info btn-block btn-3d col-xs-10'])!!}
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</a>
                                </div>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
        </div>
    </div>
    </div>

    @if($fecha_inicio != null )
    <canvas id="bar-chart" ></canvas>
    @endif

@endsection

@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    {!! Html::script('assets/plugins/validation/js/jquery.validate.min.js') !!}
    <!--Page Level JS-->
    {!! Html::script("assets/plugins/chartjs/Chart.js") !!}
    {!! Html::script("bootstrap-datetimepicker/js/moment.js") !!}
    {!! Html::script("bootstrap-datepicker/js/bootstrap-datepicker.min.js") !!}
    {!! Html::script("bootstrap-datepicker/js/datepicker-es.js") !!}
    {!! Html::script("bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js") !!}



    <!--inicio de charts.js-->
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: [
                    @foreach($puertas_usadas as $puerta)
                        '{{ App\Puerta::find($puerta->puertas_id)->nombre }}',
                    @endforeach
                ],
                datasets: [
                    {
                        label: "Usos: ",
                        backgroundColor: [
                            @foreach($puertas_usadas as $puerta)
                            'rgba('+Math.floor(Math.random() * 255)+','+Math.floor(Math.random() * 255)+','+Math.floor(Math.random() * 255)+', 0.75)',
                            @endforeach
                        ],
                        data: [

                            @foreach($puertas_usadas as $puerta)
                            {{ $puerta->total }},
                            @endforeach
                        ]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Uso de las puertas entre '+'{{$fecha_inicio}}'+' y '+'{{$fecha_fin}}'
                }
            }
        });
        <!--fin de  charts.js-->

        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            language: 'es'
        });
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    </script>

@endsection