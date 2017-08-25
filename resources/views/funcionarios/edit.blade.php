@extends('layouts.principal')

@section('content')
    @include('alertas.alertas')
    {!!Form::model($funcionario,['route'=>['funcionarios.update',$funcionario],'method'=>'PUT'])!!}
    @include('funcionarios.forms.formulario')
    <div class="form-group">
        {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
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