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

    {{--CSS de cada seccion--}}
    @yield('cargarcss')

</head>

<body>
<section id="container">
    <header id="header">
        <!--logo start-->
        <div class="brand">
            <a href="/" class="logo"><span>CUSTO</span>DE</a>
        </div>
        <!--logo end-->
        <div class="toggle-navigation toggle-left">
            <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="user-nav">
            <ul>
                <li class="dropdown messages">
                    <span class="badge badge-danager animated bounceIn" id="new-messages">5</span>
                    <button type="button" class="btn btn-default dropdown-toggle options" id="toggle-mail" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                    </button>
                    <ul class="dropdown-menu alert animated fadeInDown">
                        <li>
                            <h1>You have <strong>5</strong> new messages</h1>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="assets/img/avatar.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">James Bagian</span>
                                    <span class="time">30 mins</span>
                                    <div class="message-content">Lorem ipsum dolor sit amet, elit rutrum felis sed erat augue fusce...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="assets/img/avatar1.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Jeffrey Ashby</span>
                                    <span class="time">2 hour</span>
                                    <div class="message-content">hendrerit pellentesque, iure tincidunt, faucibus vitae dolor aliquam...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="assets/img/avatar2.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">John Douey</span>
                                    <span class="time">3 hours</span>
                                    <div class="message-content">Penatibus suspendisse sit pellentesque eu accumsan condimentum nec...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="assets/img/avatar3.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Ellen Baker</span>
                                    <span class="time">7 hours</span>
                                    <div class="message-content">Sem dapibus in, orci bibendum faucibus tellus, justo arcu...</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="assets/img/avatar4.gif" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Ivan Bella</span>
                                    <span class="time">6 hours</span>
                                    <div class="message-content">Curabitur metus faucibus sapien elit, ante molestie sapien...</div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#">Check all messages <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>

                </li>
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
                            <a href="#"><i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge badge-danager" id="user-inbox">5</span></a>
                        </li>
                        <li>
                            <i class="fa fa-power-off"> {!!link_to_route('home.logout', ' Cerrar session')!!}</i>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="toggle-navigation toggle-right">
                        <button type="button" class="btn btn-default" id="toggle-right">
                            <i class="fa fa-comment"></i>
                        </button>
                    </div>
                </li>

            </ul>
        </div>
    </header>
    <!--sidebar left start-->
    <aside class="sidebar">
        <div id="leftside-navigation" class="nano">
            <ul class="nano-content">
                <li class="active">
                    <a href="funcionarios"><i class="fa fa-users"></i><span>FUNCIONARIOS</span></a>
                </li>
                <li class="active">
                    <a href="/secciones"><i class="fa  fa-list"></i><span>SECCIONES Y CARGOS</span></a>
                </li>
                <li class="active">
                    <a href="funcionarios"><i class="fa fa-users"></i><span>INVITADOS</span></a>
                </li>
                <li class="active">
                    <a href="/usuarios"><i class="fa fa-users"></i><span>USUARIOS</span></a>
                </li>
                <li class="active">
                    <a href="funcionarios"><i class="fa fa-clock-o"></i><span>HORARIOS</span></a>
                </li>
                <li class="active">
                    <a href="funcionarios"><i class="fa  fa-files-o"></i><span>LICENCIAS</span></a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-list"></i><span>GESTIOS DE AREAS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>

                        <li><a href="ui-alerts-notifications.html">Alerts &amp; Notifications</a>
                        </li>
                        <li><a href="ui-panels.html">Panels</a>
                        </li>
                        <li><a href="ui-buttons.html">Buttons</a>
                        </li>
                        <li><a href="ui-slider-progress.html">Sliders &amp; Progress</a>
                        </li>
                        <li><a href="ui-modals-popups.html">Modals &amp; Popups</a>
                        </li>
                        <li><a href="ui-icons.html">Icons</a>
                        </li>
                        <li><a href="ui-grid.html">Grid</a>
                        </li>
                        <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a>
                        </li>
                        <li><a href="ui-nestable-list.html">Nestable Lists</a>
                        </li>
                    </ul>
                </li>
                <li class="active">
                    <a href="funcionarios"><i class="fa fa-list"></i><span>CONTROL DE AREAS</span></a>
                </li>
                <li class="active">
                    <a href="funcionarios"><i class="fa fa-list"></i><span>ESTADISTICAS</span></a>
                </li>
                <li class="active">
                    <a href="funcionarios"><i class="fa fa-list"></i><span>AUDITORIAS</span></a>
                </li>
                <li class="active">
                    <a href="funcionarios"><i class="fa fa-files-o"></i><span>REPORTES</span></a>
                </li>
            </ul>
        </div>
        </nav>

    </aside>
    <!--sidebar left end-->
    <!--main content start-->
    <section class="main-content-wrapper">
        <section id="main-content">
            <!--tiles start-->

            <!--aca primer corte-->
            <!--tiles end-->
            <!--dashboard charts and map start-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            @yield('titulo-tarjeta')
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!--segundo corte-->
            </div>
        </section>
    </section>
    <!--main content end-->
    <!--sidebar right start-->
    <aside class="sidebarRight">
        <div id="rightside-navigation ">
            <div class="sidebar-heading"><i class="fa fa-user"></i> Contacts</div>
            <div class="sidebar-title">online</div>
            <div class="list-contacts">
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="assets/img/avatar.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>James Bagian</h4>
                        <p>Los Angeles, CA</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="assets/img/avatar1.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Jeffrey Ashby</h4>
                        <p>New York, NY</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="assets/img/avatar2.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>John Douey</h4>
                        <p>Dallas, TX</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="assets/img/avatar3.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Ellen Baker</h4>
                        <p>London</p>
                    </div>
                    <div class="item-status item-status-away"></div>
                </a>
            </div>

            <div class="sidebar-title">offline</div>
            <div class="list-contacts">
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="assets/img/avatar4.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Ivan Bella</h4>
                        <p>Tokyo, Japan</p>
                    </div>
                    <div class="item-status"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="assets/img/avatar5.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Gerald Carr</h4>
                        <p>Seattle, WA</p>
                    </div>
                    <div class="item-status"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="assets/img/avatar6.gif" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Viktor Gorbatko</h4>
                        <p>Palo Alto, CA</p>
                    </div>
                    <div class="item-status"></div>
                </a>
            </div>
        </div>
    </aside>
    <!--sidebar right end-->
</section>
{{--Global JS--}}
{!! Html::script('assets/js/jquery-1.10.2.min.js') !!}
{!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/waypoints/waypoints.min.js') !!}
{!! Html::script('assets/js/application.js') !!}
{{--Java Scrip de cada seccion--}}
@yield('cargarjs')



</body>

</html>