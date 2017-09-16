<!DOCTYPE html>
{{--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]--}}
{{--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]--}}
{{--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]--}}
{{--[if gt IE 8]><!--}}
<html class="no-js">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    {{-- Favicon --}}
    <link rel="shortcut icon" src="{{url('assets/img/logo_empresa.png')}}" type="image/x-icon">
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

    {{--CSS de cada seccion--}}
    @yield('cargarcss')

</head>

<body>
<section id="container">
    <header id="header">
        <!--logo start-->
        <div class="brand">
            <a href="/home"><img src="{{url('assets/img/logo_empresa.png')}}" width="400" height="90"></a>
        </div>
        <!--logo end-->
        <div class="toggle-navigation toggle-left">
            <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="user-nav">
            <ul>
                <li class="profile-photo">
                    <img src="assets/img/avatar.png" alt="" class="img-circle">
                </li>
                <li class="dropdown settings">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!! Auth::User()->name !!}
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu animated fadeInDown">
                        <li>
                            <i class="fa fa-power-off"> {!!link_to_route('home.logout', ' Cerrar session')!!}</i>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!--sidebar left start-->
    <aside class="sidebar">
        <div id="leftside-navigation" class="nano">
            <ul class="nano-content">
                <li class="active">
                    <a href="/home" style="padding-bottom: 0em !important;"><i class="glyphicon glyphicon-home"></i><span>HOME</span></a>
                </li>
                <li class="active">
                    <a href="/funcionarios" style="padding-bottom: 0.3em !important;"><i class="fa fa-users"></i><span>FUNCIONARIOS</span></a>
                </li>
                <li class="active">
                    <a href="/secciones" style="padding-bottom: 0.3em !important;"><i class="fa  fa-list"></i><span>SECCIONES</span></a>
                </li>
                <li class="active">
                    <a href="/cargos" style="padding-bottom: 0.3em !important;"><i class="fa  fa-list"></i><span>CARGOS</span></a>
                </li>
                <li class="active">
                    <a href="/invitados" style="padding-bottom: 0.3em !important;" ><i class="fa fa-users"></i><span>INVITADOS</span></a>
                </li>
                <li class="active">
                    <a href="/usuarios" style="padding-bottom: 0.3em !important;"><i class="fa fa-users"></i><span>USUARIOS</span></a>
                </li>
                <li class="active">
                    <a href="/horariogeneral/show" style="padding-bottom: 0.3em !important;"><i class="fa fa-clock-o"></i><span>HORARIOS</span></a>
                </li>
                <li class="active">
                    <a href="/licencias" style="padding-bottom: 0.3em !important;"><i class="fa  fa-files-o"></i><span>LICENCIAS</span></a>
                </li>
                <li class="active">
                    <a href="/GestionAreas" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>GESTION DE AREAS</span></a>
                </li>
                 <li class="active">
                    <a href="/area/1" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>CONTROL DE AREAS</span></a>
                </li>
                <li class="active">
                    <a href="/Estadisticas" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>ESTADISTICAS</span></a>
                </li>
                <li class="active">
                    <a href="/home" style="padding-bottom: 0.3em !important;"><i class="fa fa-list"></i><span>AUDITORIAS</span></a>
                </li>
                <li class="active">
                    <a href="/home" style="padding-bottom: 0em !important;"><i class="fa fa-gears"></i><span>CONFIGUARION INICIAL</span></a>
                </li>

            </ul>
        </div>
        </nav>

    </aside>
    <!--sidebar left end-->
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content" >
            <!--tiles start-->

            <!--aca primer corte-->
            <!--tiles end-->
            <!--dashboard charts and map start-->

                @include('alertas.alertas')
                @yield('content')
                </div>
        </section>
    </section>
</section>
{{--Global JS--}}
{!! Html::script('assets/js/jquery-1.10.2.min.js') !!}
{!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/waypoints/waypoints.min.js') !!}
{!! Html::script('assets/js/application.js') !!}
{!! Html::script("assets/plugins/chartjs/Chart.js") !!}
{{--Java Scrip de cada seccion--}}
@yield('cargarjs')



</body>

</html>