

<div class="col-md-12 row center-xs panel-heading ">
    <div class="col-xs-12">
        {!!link_to_route('IntervalosSecciones.create', 'Agregar intervalo en el horario de la sección', $seccion->id,['class'=>'btn btn-info btn-block btn-3d'])!!}
    </div>
</div>
<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Desde</th>
        <th>Hasta</th>
        <th>Dia</th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($intervalosSeccionesAgrupados as $intervalo_seccion)
        <tr>
            <td>{{$intervalo_seccion->desde}}</td>
            <td>{{$intervalo_seccion->hasta}}</td>
            <td>
                @foreach($intervalo_seccion->dias as $dia)
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


            <th>
                {!!Form::open(['route'=>['IntervalosSecciones.destroy',$intervalo_seccion->dias[0]->id,$seccion->id], 'method'=>'DELETE'])!!}
                {!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
                {!!Form::close()!!}
            </th>
        </tr>
    @endforeach
    </tbody>
</table>


