@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection


<div class="col-md-12">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">Intervalos que del funcionario {{$funcionario->nombre}}</h3>
            <div class="actions pull-right">
                <i class="fa fa-chevron-down"></i>

            </div>
        </div>
        <div class="panel-body">
            <div class="col-md-12 row center-xs panel-heading ">
                <div class="col-xs-12">
                    {!!link_to_route('IntervalosFuncionarios.create', 'Agregar intervalo en el horario', $funcionario->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                </div>
            </div>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>desde</th>
                    <th>hasta</th>
                    <th>dia</th>
                    <th>ver</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($horariosEspecialesAgrupados as $horarioEspecialesAgrupado)
                    <tr>
                        <td>{{$horarioEspecialesAgrupado->desde}}</td>
                        <td>{{$horarioEspecialesAgrupado->hasta}}</td>
                        <td>
                            @foreach($horarioEspecialesAgrupado->dias as $dia)
                                @if($dia->dia == 1)
                                    Lunes
                                @elseif($dia->dia == 2)
                                    Martes
                                @elseif($dia->dia == 3)
                                    Miercoles
                                @elseif($dia->dia == 4)
                                    Jueves
                                @elseif($dia->dia == 5)
                                    Viernes
                                @elseif($dia->dia == 6)
                                    Sabado
                                @elseif($dia->dia == 7)
                                    Domingo
                                @endif

                            @endforeach
                        </td>
                        <th>{!!link_to_route('IntervalosFuncionarios.show', $title = 'ver', $parameters = $horarioEspecialesAgrupado->dias[0]->id, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                        <th>
                            {!!Form::open(['route'=>['IntervalosFuncionarios.destroy',$horarioEspecialesAgrupado->dias[0]->id], 'method'=>'DELETE'])!!}
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