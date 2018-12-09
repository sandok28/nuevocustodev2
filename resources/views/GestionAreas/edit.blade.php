@extends('layouts.principal')

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Editar puerta</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">
                {!!Form::model($puerta,['route'=>['puertas.update',$puerta],'method'=>'PUT'])!!}
                @include('GestionAreas.forms.formulario')
                @if(($puerta->estatus) == 1)
                    <div class="form-group">
                        {{ Form::checkbox('estatus', '0',false),['class'=>'form-control'] }}
                        {{ Form::label('dar de baja') }}
                    </div>
                @else
                    <div class="form-group">
                        {{ Form::checkbox('estatus', '1',false),['class'=>'form-control'] }}
                        {{ Form::label('Reactivar') }}
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="panel-heading row">
                        <div class="col-md-6">
                            {!!Form::submit('Actualizar',['class'=>'btn btn-info btn-block btn-3d col-xs-10'])!!}
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

@endsection
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('js/generarllave.js') !!}
@endsection