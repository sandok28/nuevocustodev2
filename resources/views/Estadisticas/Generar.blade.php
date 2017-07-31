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
    {!! Form::close() !!}

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sales for 2014</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
                <div id="sales-chart" style="height: 250px;"></div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            app.timer();
            app.map();
            app.weather();
            app.morrisPie();
        });
    </script>


@endsection

@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    {!! Html::script('assets/plugins/validation/js/jquery.validate.min.js') !!}
    <!--Page Level JS-->
    {!! Html::script("assets/plugins/icheck/js/icheck.min.js") !!}
    {!! Html::script("assets/plugins/validation/js/jquery.validate.min.js") !!}
    {!! Html::script("assets/js/jquery-2.1.4.min.js") !!}
    {!! Html::script("assets/js/webcam.min.js") !!}
    {!! Html::script("assets/js/say-cheese.js")!!}
    {!! Html::script("https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquey.main.js")!!}
    {!! Html::script("assets/plugins/morris/css/morris.css") !!}



    <!-- FlotCharts  -->
    {!! Html::script("assets/plugins/flot/js/jquery.flot.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.resize.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.canvas.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.image.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.categories.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.crosshair.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.errorbars.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.fillbetween.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.navigate.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.pie.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.selection.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.stack.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.symbol.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.threshold.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.colorhelpers.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.time.min.js") !!}
    {!! Html::script("assets/plugins/flot/js/jquery.flot.example.js") !!}
    {!! Html::script("assets/plugins/morris/js/morris.min.js") !!}




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
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46627904-1', 'authenticgoods.co');
        ga('send', 'pageview');
    </script>
@endsection