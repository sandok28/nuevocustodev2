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

@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">GENERAR ESTADISTICAS </h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
            {!! Form::open() !!}
            @include('Estadisticas.forms.formulario')
            {!! Form::button('Generar Estadistica',['class'=>'btn btn-primary','onclick'=>'dibujar()']) !!}
            {!! Form::submit('Guardar Estadistica',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}



            <!--inicio de charts.js-->

                <canvas id = "myChart"  > </canvas>
                <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
                <script>
                    function dibujar() {
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var titulo = String(document.getElementById('tipo').value);


                        var chart = new Chart(ctx, {
                            type: 'radar',

                            data: {
                                labels: [
                                    @forEach($nombres as $nombre)
                                        '{{$nombre->nombre}}',
                                    @endforeach
                                ],
                                datasets: [{
                                    label: titulo,
                                    backgroundColor: 'rgb(0, 0, 0)',
                                    borderColor: 'rgb(255, 255, 255)',
                                    data: [
                                        @forEach($horarios as $horario)
                                        {{$horario->hoario_normal}},
                                        @endforeach
                                    ],
                                }]
                            },

                            options: {}
                        });
                    }
                </script>

                <!--fin de  charts.js-->
            </div>
        </div>
    </div>



@endsection

@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    {!! Html::script('assets/plugins/validation/js/jquery.validate.min.js') !!}
    <!--Page Level JS-->
    {!! Html::script("assets/plugins/chartjs/Chart.js") !!}



@endsection