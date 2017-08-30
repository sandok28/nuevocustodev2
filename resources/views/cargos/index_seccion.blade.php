
<div class="col-md-12 row center-xs panel-heading ">
    <div class="col-xs-12">
        {!!link_to_route('cargos.index', 'Agregar Cargo', $seccion->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
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
        @foreach($cargos as $cargo)
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
