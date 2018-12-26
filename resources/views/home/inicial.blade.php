@extends('layouts.principal')

@section('titel')
    Configuración inicial
@endsection

@section('cargarcss')
    {{-- Bootstrap Slider --}}
    {!! Html::style('assets/plugins/bootstrap-slider/css/slider.css') !!}
@endsection


@section('content')
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Configuración inicial</h3>
                <div class="actions pull-right">
                    <i class="fa fa-chevron-down"></i>
                </div>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Progreso</h3>
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
                    <div class="col-md-12">
                    @if($num_puertas > 0)
                        <div class="panel panel-success">
                    @else
                        <div class="panel panel-danger">
                    @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">1. Crear puertas</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <p>Se deben configurar las puertas de la organización que seran controladas por el sistema.</p>
                                </div>
                                <div class="col-md-4">
                                    @if($num_puertas > 0)
                                        {!!link_to_route('GestionAreas.index', 'Gestión de puertas', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    @else
                                        {!!link_to_route('GestionAreas.index', 'Gestión de puertas', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    @if($num_control_puertas > 0)
                        <div class="panel panel-success">
                    @else
                        <div class="panel panel-danger">
                    @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">2. ASIGNAR CONTROL DE LAS PUERTAS</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <p>Se debe especificar el control que tiene tu usuario sobre las puertas creadas.</p>
                                    <p>Solo las puertas especificadas se podran gestionar desde el sistema por el usurio en sesion.</p>
                                </div>
                                <div class="col-md-6">
                                    @if($num_control_puertas > 0)
                                        {!!link_to_route('usuarios.edit', 'Gestión de usuarios', Auth::User()->id,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    @else
                                        {!!link_to_route('usuarios.edit', 'Gestión de usuarios', Auth::User()->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    @if($num_horario_general > 0)
                        <div class="panel panel-success">
                    @else
                        <div class="panel panel-danger">
                    @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">3. Crear horario general</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <p>Se debe configurar el horario general de la empresa.</p>
                                </div>
                                <div class="col-md-4">
                                    @if($num_horario_general > 0)
                                        {!!link_to_route('horariogeneral.show', 'Gestión de horarios', Auth::User()->id,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    @else
                                        {!!link_to_route('horariogeneral.show', 'Gestión de horarios', Auth::User()->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    @if($num_secciones > 0)
                        <div class="panel panel-success">
                    @else
                        <div class="panel panel-danger">
                    @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">4. Crear secciones</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <p>Se debe configurar las secciones que agrupan distintias puertas en la empresa.</p>
                                </div>
                                <div class="col-md-4">
                                    @if($num_secciones > 0)
                                        {!!link_to_route('secciones.index', 'Gestión de secciones', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    @else
                                        {!!link_to_route('secciones.index', 'Gestión de secciones', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    @if($num_cargos > 0)
                        <div class="panel panel-success">
                    @else
                        <div class="panel panel-danger">
                    @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">5. Crear cargos</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <p>Se debe configurar los cargos en la empresa y asociarlos a las secciones a las que corresponden.</p>
                                </div>
                                <div class="col-md-4">
                                    @if($num_cargos > 0)
                                        {!!link_to_route('cargos.index', 'Gestión de cargos', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    @else
                                        {!!link_to_route('cargos.index', 'Gestión de cargos', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    @if($num_funcionarios > 0)
                        <div class="panel panel-success">
                    @else
                        <div class="panel panel-danger">
                    @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">6. Crear funcionarios</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <p>Se debe registrar los funcionarios en la empresa</p>
                                </div>
                                <div class="col-md-4">
                                    @if($num_funcionarios > 0)
                                        {!!link_to_route('funcionarios.index', 'Gestión de funcionarios', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    @else
                                        {!!link_to_route('funcionarios.index', 'Gestión de funcionarios', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                    @if($num_usuarios > 1)
                        <div class="panel panel-success">
                    @else
                        <div class="panel panel-danger">
                    @endif
                            <div class="panel-heading">
                                <h3 class="panel-title">7. Crear usuario auxiliar</h3>
                                <div class="actions pull-right">
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <p>Se recomienda crear un usuario auxiliar, el cual pueda realizar algunas fucniones especificas segun sus necesidades</p>
                                </div>
                                <div class="col-md-4">
                                    @if($num_usuarios > 1)
                                        {!!link_to_route('usuarios.index', 'Gestión de usuarios', null,['class'=>'btn btn-default btn-block btn-3d'])!!}
                                    @else
                                        {!!link_to_route('usuarios.index', 'Gestión de usuarios', null,['class'=>'btn btn-info btn-block btn-3d'])!!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
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
