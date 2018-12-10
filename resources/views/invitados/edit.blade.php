@extends('layouts.principal')
@section('titel')
    editar invitado
@endsection

@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Editar Invitado</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                {!!Form::model($invitado,['route'=>['invitados.update',$invitado],'method'=>'PUT'])!!}
                @include('invitados.forms.formulario_edit')
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
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Lista intervalos del invitado</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>

                </div>
            </div>
            <div class="panel-body">
                @include('intervalos_invitados.index')
            </div>
        </div>
    </div>

@endsection
@section('cargarjs')
    {!! Html::script("bootstrap-datepicker/js/bootstrap-datepicker.min.js") !!}
    {!! Html::script("bootstrap-datepicker/js/datepicker-es.js") !!}


    <script>
        //
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            language: 'es'
        });

    </script>
@endsection