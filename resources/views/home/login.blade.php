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
                            Sign In
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p> Login to access your account.</p>
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
                                    <a href="javascript:void(0)" class="help-block">Forgot Your Password?</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">

                                    {!!Form::submit('Ingresar',['class'=>'btn btn-primary btn-block '])!!}

                                    <hr />
                                    {!!link_to_route('errores.error404', 'Olvido la contraseña?', null,['class'=>'btn btn-default btn-block'])!!}
                                </div>
                            </div>
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection