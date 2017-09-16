@extends('layouts.base')

@section('title')
    Login
@endsection
@section('content')

    <section id="login-container">

        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Inicio de session
                        </h3>
                    </div>
                    <div class="panel-body">
                        @include('alertas.alertas')
                        <p> Ingrese los datos de su cuenta.</p>
                        {!!Form::open(['route'=>'home.login','class'=>'form-horizontal', 'role' =>'form', 'method'=>'POST'])!!}

                            <div class="form-group">
                                <div class="col-md-12">
                                    {!!Form::text('email',null,['id'=>'email','class'=>'form-control','placeholder'=>'Ingresa el Nombre del usuario'])!!}
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    {!!Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>'Contraseña'])!!}
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>


                            <div class="form-group" style="margin: 0px;">
                                <div class="col-md-12">

                                    {!!Form::submit('Ingresar',['class'=>'btn btn-primary btn-block '])!!}
                                </div>
                                <div class="col-md12">
                                    <img src="{{url('assets/img/logo_empresa.png')}}" width="400" height="90">
                                </div>
                            </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection