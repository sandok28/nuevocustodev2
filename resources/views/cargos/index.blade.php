
@section('cargarcss')
    {{-- DataTables--}}
    {!! Html::style('assets/plugins/dataTables/css/dataTables.css') !!}
@endsection

<section id="main-content">
    <div class="row">

        <div class="col-md-12">
            <div class="row panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cargos que se desempeñan en esta area </h3>

                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>


                <div class="panel-body">
                    <div class="col-md-12 row center-xs panel-heading ">
                        <div class="col-xs-12">
                            {!!link_to_route('cargos.new', 'Agregar Cargo', $seccion->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
                        </div>
                    </div>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>estatus</th>
                                <th>editar</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($seccion->cargos as $cargo)
                                <tr>
                                    <td>{{$cargo->nombre}}</td>
                                    @if(($cargo->estatus) == 1)
                                        <th>activo</th>
                                    @else
                                        <th>inactivo</th>
                                    @endif
                                    <th>{!!link_to_route('cargos.edit', $title = 'Editar', $parameters = $cargo, $attributes = ['class'=>'btn btn-primary'])!!}</th>
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
    <script>

    </script>
@endsection