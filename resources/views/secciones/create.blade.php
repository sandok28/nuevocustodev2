@extends('layouts.principal')
@section('titel')
    agregar sección
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Crear sección</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            {!!Form::open(['route'=>'secciones.store', 'method'=>'POST'])!!}
                            <div class="col-md-6">
                                @include('secciones.forms.formulario')
                            </div>
                            <div class="row col-md-6 top-space" style="margin-top: 1.4em;" >
                                <div class="col-md-6">
                                    {!!Form::submit('Registrar seccion',['class'=>'btn btn-info btn-block btn-3d'])!!}
                                </div>
                                <div class="col-md-6">
                                    {!!link_to_route('secciones.index', 'Volver', null,['class'=>'btn btn-primary btn-block btn-3d'])!!}
                                </div>
                            </div>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection