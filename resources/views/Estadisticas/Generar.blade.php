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
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">GENERAR ESTADISTICAS </h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
            {!! Form::open() !!}
            @include('Estadisticas.forms.formulario')
            {!! Form::button('Generar Estadistica',['class'=>'btn btn-primary','onclick'=>'dibujar()']) !!}
            {!! Form::close() !!}



            <!--inicio de charts.js-->

                <canvas id = "myChart"  > </canvas>
                <script src = "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

                @if($puertas==null)
                    @else

                    <script>
                        function dibujar() {
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var titulo = String(document.getElementById('tipo').value);
                            var chart = new Chart(ctx, {
                                type: 'bar',

                                data: {
                                    labels: [
                                       //nombre funcionarios
                                    ],
                                    datasets: [{
                                        label: titulo,
                                        backgroundColor: 'rgb(0, 0, 0)',
                                        borderColor: 'rgb(255, 255, 255)',
                                        data: [
                                            //ingresos exitosos de puertas
                                        ],
                                    }]
                                },

                                options: {}
                            });
                        }
                        function dibujar1() {
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var titulo = String(document.getElementById('tipo').value);
                            var chart = new Chart(ctx, {
                                type: 'bar',

                                data: {
                                    labels: [
                                        @forEach($funcionarios as $funcionario)
                                            '{{$funcionario->nombre}}',
                                        @endforeach
                                    ],
                                    datasets: [{
                                        label: titulo,
                                        backgroundColor: 'rgb(0, 0, 0)',
                                        borderColor: 'rgb(255, 255, 255)',
                                        data: [
                                            @forEach($funcionarios as $funcionario)
                                            '{{$funcionario->estatus}}',
                                            @endforeach
                                        ],
                                    }]
                                },

                                options: {}
                            });
                        }
                    </script>

                @endif


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
    {!! Html::script("bootstrap-datetimepicker/js/moment.js") !!}
    {!! Html::script("bootstrap-datepicker/js/bootstrap-datepicker.min.js") !!}
    {!! Html::script("bootstrap-datepicker/js/datepicker-es.js") !!}
    {!! Html::script("bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js") !!}


    <script>

        $('#tipo').change(function () {
            var opcion=$(this).val();
            if(opcion=="cant_dias_fun")
            {
                $("#hora").hide();
            }else if(opcion=="cant_ingresos_area")
            {
                $("#hora").show();
            }
        })
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