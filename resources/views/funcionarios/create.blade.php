@extends('layouts.principal')
@section('titel')
    Crear Funcionarios
@endsection
@section('titulo-tarjeta')
    <h1>CREAR FUNCIONARIOS</h1>
@endsection
@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
    <!-- iCheck-->
    {!! Html::style("assets/plugins/icheck/css/_all.css") !!}
    {!! Html::style("bootstrap-datepicker/css/bootstrap-datepicker.min.css") !!}



@endsection

@section('content')
    <div>
        @include('alertas.alertas')
        {!!Form::open(['route'=>'funcionarios.store', 'method'=>'POST'])!!}
        @include('funcionarios.forms.formulario')
        {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>

@endsection

@section('cargarjs')
    {!! Html::script("assets/plugins/icheck/js/icheck.min.js") !!}
    {!! Html::script("assets/plugins/validation/js/jquery.validate.min.js") !!}
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