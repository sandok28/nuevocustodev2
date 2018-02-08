@extends('layouts.principal')

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Menu Principal</h3>
        </div>
    </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <section id="main-content">
                    <div class="container"><br><br>
                        <div class="col-md-12" style="padding-bottom: 3em;">
                            <div class="col-md-4" >
                                <img src="{{url('assets/img/horario.png')}}" width="200" height="200"
                                     alt class="img-responsive img-circle img-thumbnail  form-inline">
                                <a href="{{route('horariogeneral.show')}}" class="btn btn-info btn-block btn-3d" style=" width:200px;">
                                    <i class="glyphicon glyphicon-arrow-right "></i>
                                    Ir a Horarios
                                </a>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url('assets/img/usuarios.jpg')}}" width="200" height="200"
                                     alt class="img-responsive img-circle img-thumbnail form-inline">
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="{{route('usuarios.index')}}" class="btn btn-info btn-block btn-3d" style=" width:200px;">
                                            <i class="glyphicon glyphicon-arrow-right "></i> Ir a Usuarios</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url('assets/img/invitado.png')}}" width="200" height="200"
                                     alt class="img-responsive img-circle img-thumbnail form-inline">
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="{{route('invitados.index')}}" class="btn btn-info btn-block btn-3d" style=" width:200px;">
                                            <i class="glyphicon glyphicon-arrow-right "></i> Ir a Invitado</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <div class="col-md-4">
                                <img src="{{url('assets/img/secciones.png')}}" width="200" height="200"
                                     alt class="img-responsive img-circle img-thumbnail form-inline"><br>
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="{{route('secciones.index')}}" class="btn btn-info btn-block btn-3d" style=" width:200px;">
                                            <i class="glyphicon glyphicon-arrow-right "></i> Ir a Secciones</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url('assets/img/puerta.png')}}" width="200" height="200"
                                     alt class="img-responsive img-circle img-thumbnail form-inline">
                                <div class="row">
                                    <div class="col-md-8">
                                        <a href="{{route('GestionAreas.index')}}" class="btn btn-info btn-block btn-3d" style=" width:200px;">
                                            <i class="glyphicon glyphicon-arrow-right "></i>Ir a Gestion Areas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <img src="{{url('assets/img/funcionarios.png')}}" width="200" height="200" a
                                     lt class="img-responsive img-thumbnail img-circle form-inline">
                                <div class="row">

                                    <div class="col-md-7">
                                        <a href="{{route('funcionarios.index')}}" class="btn btn-info btn-block btn-3d" style=" width:200px;">
                                            <i class="glyphicon glyphicon-arrow-right "></i> Ir a Funcionarios</a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
        </div>



@endsection