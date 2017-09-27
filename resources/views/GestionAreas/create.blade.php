@extends('layouts.principal')

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">CREAR USUARIO</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                <div>
                    <p>CREAR USUARIO</p>

                </div>
                <div>
                    {!!Form::open(['route'=>'puertas.store', 'method'=>'POST'])!!}
                    @include('GestionAreas.forms.formulario')
                    <div>
                        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>

        </div>
    </div>




@endsection
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('js/generarllave.js') !!}
@endsection