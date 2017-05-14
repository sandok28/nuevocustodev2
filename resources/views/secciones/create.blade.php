@extends('layouts.principal')

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div>
                <p>CREAR SECCION</p>
            </div>
            <div class="row">
                {!!Form::open(['route'=>'secciones.store', 'method'=>'POST'])!!}
                <div class="col-md-6">
                 @include('secciones.forms.formulario')
                </div>
                <div class="row col-md-6 top-space" >
                    <div class="col-md-6">
                        {!!Form::submit('Registrar Seccion',['class'=>'btn btn-info btn-block btn-3d'])!!}
                    </div>
                    <div class="col-md-6">
                        {!!link_to_route('secciones.index', 'Cancelar', null,['class'=>'btn btn-primary btn-block btn-3d'])!!}
                    </div>

                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
@endsection