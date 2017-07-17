@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

<section id="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="row panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Intervalos que del invitado {{$invitado->nombre}} </h3>

                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 row center-xs panel-heading ">
                        <div class="col-xs-12">
                            {!!link_to_route('intervalos.create', 'Agregar Intervalo', $invitado->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>targeta_rfid</th>
                                <th>desde</th>
                                <th>hasta</th>
                                <th>Puertas</th>
                                <th>eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invitado->intervalos as $intervalo)
                                <tr>
                                    <td>{{$intervalo->targeta_rfid}}</td>
                                    <td>{{$intervalo->desde}}</td>
                                    <td>{{$intervalo->hasta}}</td>
                                    <th>{!!link_to_route('intervalos.show', $title = 'ver', $parameters = $intervalo, $attributes = ['class'=>'btn btn-primary'])!!}</th>
                                    <th>
                                        {!!Form::open(['route'=>['intervalos.destroy',$intervalo], 'method'=>'DELETE'])!!}
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