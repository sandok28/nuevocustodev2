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
@endsection
@section('content')
    <div>

        {!!Form::open(['route'=>'invitados.store', 'method'=>'POST'])!!}
            @include('invitados.forms.formulario')
            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
        {!!Form::close()!!}
    </div>

@endsection

@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/icheck/js/icheck.min.js') !!}
    {!! Html::script('assets/plugins/validation/js/jquery.validate.min.js') !!}
    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {
                    input1: {
                        required: true
                    },
                    input2: {
                        minlength: 5,
                        required: true
                    },
                    input3: {
                        maxlength: 5,
                        required: true
                    },
                    input4: {
                        required: true,
                        minlength: 4,
                        maxlength: 8
                    },
                    input5: {
                        required: true,
                        min: 5
                    },
                    input6: {
                        required: true,
                        range: [5, 50]
                    },
                    input7: {
                        minlength: 5
                    },
                    input8: {
                        required: true,
                        minlength: 5,
                        equalTo: "#input7"
                    },
                    input9: {
                        required: true,
                        email: true
                    },
                    input10: {
                        required: true,
                        url: true
                    },
                    input11: {
                        required: true,
                        digits: true
                    },
                    input12: {
                        required: true,
                        phoneUS: true
                    },
                    input13: {
                        required: true,
                        minlength: 5
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('success').addClass('error');
                },
                success: function(element) {
                    element.text('OK!').addClass('valid')
                        .closest('.form-group').removeClass('error').addClass('success');
                }
            });


        });
    </script>

@endsection