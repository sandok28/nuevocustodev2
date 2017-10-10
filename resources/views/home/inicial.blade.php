@extends('layouts.principal')

@section('titel')
    modulo inicial
@endsection

@section('cargarcss')
    {{-- Bootstrap Slider --}}
    {!! Html::style('assets/plugins/bootstrap-slider/css/slider.css') !!}
@endsection


@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Modulo Inicial</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">PRIMERO PASOS</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            @if($progreso < 14 )
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-default" style="width: 2%">0%</div>
                                </div>
                            @elseif($progreso < 16)
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" style="width: 15%">15%</div>
                                </div>
                            @elseif($progreso < 21)
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-danger" style="width: 20%">20%</div>
                                </div>
                            @elseif($progreso < 41)
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-warning" style="width: 40%">40%</div>
                                </div>
                            @elseif($progreso < 56)
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-default" style="width: 55%">55%</div>
                                </div>
                            @elseif($progreso < 71)
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-info" style="width: 70%">70%</div>
                                </div>
                            @elseif($progreso < 86)
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-success" style="width: 85%">85%</div>
                                </div>
                            @else
                                <div class="progress progress-striped active">
                                    <div class="progress-bar progress-bar-primary" style="width: 100%">100%</div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if($num_puertas > 0)
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">1. CREACION DE PUERTAS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar las areas (puertas) que tengas en la organizacion</p>
                                    </div>
                                    <div class="col-md-4">
                                        {!!link_to_route('GestionAreas.index', 'Agregar Areas', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">1. CREACION DE PUERTAS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar las areas (puertas) que tengas en la organizacion</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('GestionAreas.index', 'Agregar Areas', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($num_control_puertas > 0)
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">2. ASIGNAR CONTROL DE LAS PUERTAS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes Actualizar el control que tiene tu usuario sobre las nuevas areas(puertas) que agregaste</p>                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('usuarios.edit', 'Asignar Control Puertas', Auth::User()->id,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">2. ASIGNAR CONTROL DE LAS PUERTAS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes Actualizar el control que tiene tu usuario sobre las nuevas areas(puertas) que agregaste</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('usuarios.edit', 'Asignar Control Puertas', Auth::User()->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($num_horario_general > 0)
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">3. ASIGNAR HORAIO GENERAL</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes configurar el horario general de la empresa</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('horariogeneral.show', 'Asignar Horario General', Auth::User()->id,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">3. ASIGNAR HORAIO GENERAL</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes configurar el horario general de la empresa</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('horariogeneral.show', 'Asignar Horario General', Auth::User()->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($num_secciones > 0)
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">4. CREACION DE SECCIONES</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar las secciones que tengas en la organizacion</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('secciones.index', 'Agregar Secciones', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">4. CREACION DE SECCIONES</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar las secciones que tengas en la organizacion</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('secciones.index', 'Agregar Secciones', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($num_cargos > 0)
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">5. CREACION DE CARGOS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar los cargos que tengas en la organizacion no olvides asociarlos a las secciones correspondientes</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('cargos.index', 'Agregar Cargos', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">5. CREACION DE CARGOS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar los cargos que tengas en la organizacion no olvides asociarlos a las secciones correspondientes</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('cargos.index', 'Agregar Cargos', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($num_funcionarios > 0)
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">6. CREACION DE FUNCIONARIOS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar los funcionarios que tengas en la organizacion no olvides asociarlos a los cargos correspondientes</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('funcionarios.index', 'Agregar Funcionarios', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">6. CREACION DE FUNCIONARIOS</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Debes registrar los funcionarios que tengas en la organizacion no olvides asociarlos a los cargos correspondientes</p>
                                    </div>
                                    <div class="col-md-4">
                                        {!!link_to_route('funcionarios.index', 'Agregar Funcionarios', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($num_usuarios > 1)
                        <div class="col-md-12">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">7. CREACION DE USUARIO AUXILIAR</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Se recomienda crear un usuario auxiliar el cual pueda realizar algunas fucniones especificas</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('usuarios.index', 'Agregar Usuarios', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">7. CREACION DE USUARIO AUXILIAR</h3>
                                    <div class="actions pull-right">
                                        <i class="fa fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <p>Se recomienda crear un usuario auxiliar el cual pueda realizar algunas fucniones especificas</p>
                                    </div>
                                    <div class="col-md-4">

                                        {!!link_to_route('usuarios.index', 'Agregar Usuarios', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

@section('cargarjs')
    <!--Page Level JS-->
    {!! Html::script('assets/plugins/bootstrap-slider/js/bootstrap-slider.js') !!}
    <!--Load these page level functions-->
    <script>
        $(document).ready(function() {
            app.sliders();
        });
    </script>

    <script>
        var RGBChange = function() {
            $('#RGB').css('background', 'rgb(' + r.getValue() + ',' + g.getValue() + ',' + b.getValue() + ')')
        };

        var r = $('#R').slider()
            .on('slide', RGBChange)
            .data('slider');
        var g = $('#G').slider()
            .on('slide', RGBChange)
            .data('slider');
        var b = $('#B').slider()
            .on('slide', RGBChange)
            .data('slider');
    </script>
@endsection
