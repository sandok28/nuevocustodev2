@extends('layouts.principal')
@section('titel')
editar licencia en curso
@endsection

@section('content')

<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Editar Licencia En Curso</h3>
            <div class="actions pull-right">
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-times"></i>
            </div>
        </div>
        <div class="panel-body">
            {!!Form::model($licencia,['route'=>['licencias.update_en_curso',$licencia],'method'=>'PUT'])!!}
            <div class="form-group col-xs-12">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Hasta:</label>
                    <div class="col-sm-6">
                        <input class="datepicker input-group date form-control" id="hasta" name="hasta">
                    </div>
                </div>
            </div>
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
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Datos del funcionario</h3>
            <div class="actions pull-right">
                <i class="fa fa-chevron-down"></i>
                <i class="fa fa-times"></i>
            </div>
        </div>
        <div class="panel-body">
            @include('funcionarios.show')
        </div>
    </div>
</div>



@endsection