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


    <script>

        $('.pruebas').datepicker({
            dateFormat: "dd-mm-yy",
            firstDay: 1,
            dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            dayNamesShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
            monthNames:
                ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                    "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthNamesShort:
                ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                    "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"]
        });

    </script>

@endsection