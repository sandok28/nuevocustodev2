<!DOCTYPE html>

<html class="no-js">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        {{-- Favicon --}}
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
        {{-- Bootstrap core CSS --}}
        {!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
        {{-- Fonts from Font Awsome --}}
        {!! Html::style('assets/css/font-awesome.min.css') !!}
        {{-- CSS Animate --}}
        {!! Html::style('assets/css/animate.css') !!}
        {{-- Custom styles for this theme --}}
        {!! Html::style('assets/css/main.css') !!}
        {{-- Fonts --}}
        {!! Html::style('assets/css/googleapiesSourceSansPro.css') !!}
        {!! Html::style('assets/css/googleapisOpenSans.css') !!}
        {{-- Feature detection --}}
        {!! Html::script('assets/js/modernizr-2.6.2.min.js') !!}
        {{-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries --}}
        {{--[if lt IE 9]>
        {!! Html::script('assets/js/html5shiv.js') !!}
        {!! Html::script('assets/js/respond.min.js') !!}
        <![endif]--}}


    </head>

    <body>

        @yield('content')

        {{--Global JS--}}
        {!! Html::script('assets/js/jquery-1.10.2.min.js') !!}
        {!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
        {!! Html::script('assets/plugins/waypoints/waypoints.min.js') !!}
        {!! Html::script('assets/js/application.js') !!}
        {{--Java Scrip de cada seccion--}}
        @yield('cargarjs')




    </body>

</html>