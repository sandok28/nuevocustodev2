@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="row panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Intervalos que del funcionario {{$funcionario->nombre}} </h3>

                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 row center-xs panel-heading ">
                        <div class="col-xs-12">
                            {!!link_to_route('horariosespeciales.create', 'Agregar intervalo en el horario', $funcionario->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>dia</th>
                                <th>desde</th>
                                <th>hasta</th>
                                <th>ver</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($horariosEspeciales as $horarioEspecial)
                                <tr>
                                    @if($horarioEspecial->dia == 1)
                                        <td>Lunes</td>
                                    @elseif($horarioEspecial->dia == 2)
                                        <td>Martes</td>
                                    @elseif($horarioEspecial->dia == 3)
                                        <td>Miercoles</td>
                                    @elseif($horarioEspecial->dia == 4)
                                        <td>Jueves</td>
                                    @elseif($horarioEspecial->dia == 5)
                                        <td>Viernes</td>
                                    @elseif($horarioEspecial->dia == 6)
                                        <td>Sabado</td>
                                    @elseif($horarioEspecial->dia == 7)
                                        <td>Domingo</td>
                                    @endif
                                    <td>{{$horarioEspecial->desde}}</td>
                                    <td>{{$horarioEspecial->hasta}}</td>
                                    <th>{!!link_to_route('horariosespeciales.show', $title = 'ver', $parameters = $horarioEspecial->id, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                                    <th>
                                        {!!Form::open(['route'=>['horariosespeciales.destroy',$horarioEspecial], 'method'=>'DELETE'])!!}
                                        {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                                        {!!Form::close()!!}
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@section('cargarjs')
    <!--Page Leve JS -->
    {!! Html::script('assets/plugins/dataTables/js/jquery.dataTables.js') !!}
    {!! Html::script('assets/plugins/dataTables/js/dataTables.bootstrap.js') !!}
    <script>
        $(document).ready(function() {
            $('#example').dataTable();
        });
    </script>
@endsection