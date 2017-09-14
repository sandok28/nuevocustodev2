@extends('layouts.principal')

@section('content')
    aca toca colocar links a accesos directos mas usados
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <img src="{{url('assets/img/puerta.gif')}}" width="150" height="200" alt class="img-responsive img-circle form-inline">
                <a href="/area/1" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ir a</a>
            </div>
            <div class="col-md-3">
                <img src="{{url('assets/img/funcionarios.png')}}" width="350" height="5 0" alt class="img-responsive  img-circle form-inline">
                <a href="/funcionarios" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ir a</a>
            </div>
            <div class="col-md-3">
                <img src="{{url('assets/img/horario.png')}}" width="200" height="200"  alt class="img-responsive img-circle  form-inline">
                <a href="/horariogeneral/show" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ir a</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <img src="{{url('assets/img/secciones.png')}}" width="200" height="200" alt class="img-responsive img-circle form-inline">
                <a href="/secciones" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ir a</a>
            </div>
            <div class="col-md-3">
                <img src="{{url('assets/img/usuarios.jpg')}}" width="200" height="200" alt class="img-responsive img-circle form-inline">
                <a href="/usuarios" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ir a</a>
            </div>
            <div class="col-md-3">
                <img src="{{url('assets/img/invitado.png')}}" width="200" height="200" alt class="img-responsive img-circle form-inline">
                <a href="/invitados" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> Ir a</a>
            </div>
        </div>
    </div>
@endsection