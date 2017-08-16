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
                type: 'bar',

                data: {
                    labels: [
                        1
                            ],
                    datasets: [{
                        label: titulo,
                        backgroundColor: 'rgb(0, 0, 0)',
                        borderColor: 'rgb(255, 255, 255)',
                        data: [
                            1
                        ],
                    }]
                },

                options: {}
            });
        }
    </script>

    <!--fin de  charts.js-->


@endsection

@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    {!! Html::script('assets/plugins/validation/js/jquery.validate.min.js') !!}
    <!--Page Level JS-->
    {!! Html::script("assets/plugins/morris/css/morris.css") !!}
    {!! Html::script("assets/plugins/chartjs/Chart.js") !!}
    <script src="assets/plugins/chartjs/Chart.js"></script>




    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                    input1: {
                        required: true
                    },
                    input2: {
                        minlength: 5,
                        required: true
                    },
                    input3: {
                        maxlength: 5,
                        required: true
                    },
                    input4: {
                        required: true,
                        minlength: 4,
                        maxlength: 8
                    },
                    input5: {
                        required: true,
                        min: 5
                    },
                    input6: {
                        required: true,
                        range: [5, 50]
                    },
                    input7: {
                        minlength: 5
                    },
                    input8: {
                        required: true,
                        minlength: 5,
                        equalTo: "#input7"
                    },
                    input9: {
                        required: true,
                        email: true
                    },
                    input10: {
                        required: true,
                        url: true
                    },
                    input11: {
                        required: true,
                        digits: true
                    },
                    input12: {
                        required: true,
                        phoneUS: true
                    },
                    input13: {
                        required: true,
                        minlength: 5
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('success').addClass('error');
                },
                success: function(element) {
                    element.text('OK!').addClass('valid')
                        .closest('.form-group').removeClass('error').addClass('success');
                }
            });


        });
    </script>

@endsection