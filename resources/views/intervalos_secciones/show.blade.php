
<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>dia</th>
        <th>desde</th>
        <th>hasta</th>
    </tr>
    </thead>
    <tbody>
    @foreach($seccion->intervalosSecciones as $intervalo_seccion)
        <tr>
            @if($intervalo_seccion->dia == 1)
                <td>Lunes</td>
            @elseif($intervalo_seccion->dia == 2)
                <td>Martes</td>
            @elseif($intervalo_seccion->dia == 3)
                <td>Miercoles</td>
            @elseif($intervalo_seccion->dia == 4)
                <td>Jueves</td>
            @elseif($intervalo_seccion->dia == 5)
                <td>Viernes</td>
            @elseif($intervalo_seccion->dia == 6)
                <td>Sabado</td>
            @elseif($intervalo_seccion->dia == 7)
                <td>Domingo</td>
            @endif
            <td>{{$intervalo_seccion->desde}}</td>
            <td>{{$intervalo_seccion->hasta}}</td>
        </tr>
    @endforeach
    </tbody>
</table>