<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    {!! Html::style('') !!}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SpaceLab</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
{!! Html::style('assets/plugins/bootstrap/css/bootstrap.min.css') !!}
<!-- Fonts from Font Awsome -->
{!! Html::style('assets/css/font-awesome.min.css') !!}
<!-- CSS Animate -->
{!! Html::style('ssets/css/animate.css') !!}
<!-- Custom styles for this theme -->
{!! Html::style('assets/css/main.css') !!}
<!-- Vector Map  -->
{!! Html::style('assets/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css') !!}
<!-- ToDos  -->
{!! Html::style('assets/plugins/todo/css/todos.css') !!}
<!-- Morris  -->
{!! Html::style('assets/plugins/morris/css/morris.css') !!}
<!-- Fonts -->
{!! Html::style('ssets/css/googleapiesSourceSansPro.css') !!}
{!! Html::style('ssets/css/googleapisOpenSans.css') !!}
<!-- Feature detection -->
{!! Html::style('assets/js/modernizr-2.6.2.min.js') !!}
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!! Html::style('assets/js/html5shiv.js') !!}
    {!! Html::style('assets/js/respond.min.js') !!}
    <![endif]-->
</head>

<body>
<section id="container">
    <header id="header">
        <!--logo start-->
        <div class="brand">
            <a href="index.html" class="logo"><span>Space</span>Lab</a>
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
                        Mike Adams <i class="fa fa-angle-down"></i>
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
                            <a href="#"><i class="fa fa-power-off"></i> Logout</a>
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
                    <a href="index.html"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-cogs"></i><span>UI Elements</span><i class="arrow fa fa-angle-right pull-right"></i></a>
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
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-table"></i><span>Tables</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="tables-basic.html">Basic Tables</a>
                        </li>
                        <li><a href="tables-data.html">Data Tables</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa fa-tasks"></i><span>Forms</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="forms-components.html">Components</a>
                        </li>
                        <li><a href="forms-validation.html">Validation</a>
                        </li>
                        <li><a href="forms-mask.html">Mask</a>
                        </li>
                        <li><a href="forms-wizard.html">Wizard</a>
                        </li>
                        <li><a href="forms-multiple-file.html">Multiple File Upload</a>
                        </li>
                        <li><a href="forms-wysiwyg.html">WYSIWYG Editor</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>Mail</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="mail-inbox.html">Inbox</a>
                        </li>
                        <li><a href="mail-compose.html">Compose Mail</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i><span>Charts</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="charts-chartjs.html">Chartjs</a>
                        </li>
                        <li><a href="charts-morris.html">Morris</a>
                        </li>
                        <li><a href="charts-c3.html">C3 Charts</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-map-marker"></i><span>Maps</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="map-google.html">Google Map</a>
                        </li>
                        <li><a href="map-vector.html">Vector Map</a>
                        </li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="typography.html"><i class="fa fa-text-height"></i><span>Typography</span></a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:void(0);"><i class="fa fa-file"></i><span>Pages</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                    <ul>
                        <li><a href="pages-blank.html">Blank Page</a>
                        </li>
                        <li><a href="pages-login.html">Login</a>
                        </li>
                        <li><a href="pages-sign-up.html">Sign Up</a>
                        </li>
                        <li><a href="pages-calendar.html">Calendar</a>
                        </li>
                        <li><a href="pages-timeline.html">Timeline</a>
                        </li>
                        <li><a href="pages-404.html">404</a>
                        </li>
                        <li><a href="pages-500.html">500</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>


        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="#"></a>
                <li style="width: 50px; height: 50px; border: 3px solid white;"></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </div>
        </div>
        </nav>

        <div class="container-fluid text-left">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <p><a href="/Funcionarios">Funcionarios</a></p>
                    <p><a href="#">Secciones y Cargos</a></p>
                    <p><a href="#">Invitados</a></p>
                    <p><a href="#">Usuario</a></p>
                    <p><a href="#">Horarios</a></p>
                    <p><a href="#">Licencias</a></p>
                    <p><a href="#">Gestion de Areas</a></p>
                    <p><a href="#">Control de Areas</a></p>
                    <p><a href="#">Estadisticas</a></p>
                    <p><a href="#">Auditoria</a></p>
                    <p><a href="#">Reportes</a></p>
                    <p><a href="#">Ahorro de Energia</a></p>
                    <p><a href="#"></a></p>
                </div>
                <div class="col-sm-8 text-left">
                    @yield('content')

                </div>

            </div>
        </div>
        <!-- Pie de pagina toca quitarlo o pegarlo al fondo mas rato
        <footer class="container-fluid text-center">
          esto es un comentario <p>CUSTODE</p>
        </footer>
        -->
        =======
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
                            <h3 class="panel-title">TITULO</h3>
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
<!--Global JS-->
{!! Html::script('assets/js/jquery-1.10.2.min.js') !!}
{!! Html::script('assets/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('assets/plugins/waypoints/waypoints.min.js') !!}
{!! Html::script('assets/js/application.js') !!}
<!--Page Level JS-->
{!! Html::script('assets/plugins/countTo/jquery.countTo.js') !!}
{!! Html::script('') !!}
<!-- FlotCharts  -->
{!! Html::script('assets/plugins/flot/js/jquery.flot.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.resize.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.canvas.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.image.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.categories.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.crosshair.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.errorbars.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.fillbetween.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.navigate.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.pie.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.selection.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.stack.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.symbol.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.threshold.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.colorhelpers.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.time.min.js') !!}
{!! Html::script('assets/plugins/flot/js/jquery.flot.example.js') !!}
<!-- Morris  -->
{!! Html::script('assets/plugins/morris/js/morris.min.js') !!}
{!! Html::script('assets/plugins/morris/js/raphael.2.1.0.min.js') !!}
<!-- Vector Map  -->
{!! Html::script('assets/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('assets/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js') !!}
<!-- ToDo List  -->
{!! Html::script('assets/plugins/todo/js/todos.js') !!}
<!--Load these page level functions-->
<script>
    $(document).ready(function() {
        app.timer();
        app.map();
        app.weather();
        app.morrisPie();
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
>>>>>>> f04bfb53d812dedc983393a488e3cb8c690e8fd6

</body>

</html>