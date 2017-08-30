@extends('layouts.principal')

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
                {!!Form::model($puerta,['route'=>['puertas.update',$puerta],'method'=>'PUT'])!!}
                @include('GestionAreas.forms.formulario')
                <div class="form-group">
                    {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

@endsection
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('js/generarllave.js') !!}
@endsection