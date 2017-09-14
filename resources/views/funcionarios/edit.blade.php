@extends('layouts.principal')

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Editar Funcionario</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                    <i class="fa fa-times"></i>
                </div>
            </div>
            <div class="panel-body">
                {!!Form::model($funcionario,['route'=>['funcionarios.update',$funcionario],'method'=>'PUT'])!!}
                @include('funcionarios.forms.formulario')
                @if(($funcionario->estatus) == 1)
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

    {!!Form::close()!!}
@endsection

@section('cargarjs')
    {!! Html::script("assets/plugins/icheck/js/icheck.min.js") !!}
    {!! Html::script("assets/plugins/validation/js/jquery.validate.min.js") !!}
    {!! Html::script("bootstrap-datepicker/js/bootstrap-datepicker.min.js") !!}
    {!! Html::script("bootstrap-datepicker/js/datepicker-es.js") !!}


    <script>

        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            language: 'es'
        });

    </script>

@endsection