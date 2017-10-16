@extends('layouts.principal')
@section('titel')
    agregar usuario
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Crear Usuario</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div>
                    {!!Form::open(['route'=>'usuarios.store', 'method'=>'POST'])!!}
                        @include('usuarios.forms.formulario')
                        <div class="col-md-12">
                            <div class="panel-heading row">
                                <div class="col-md-6">
                                    {!!Form::submit('Registrar',['class'=>'btn btn-info btn-block btn-3d col-xs-10'])!!}
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-primary btn-block btn-3d" onclick="history.back();">Volver</a>
                                </div>
                            </div>
                        </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

@endsection