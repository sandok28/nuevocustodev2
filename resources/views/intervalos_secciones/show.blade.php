
<table id="example2" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>dia</th>
        <th>desde</th>
        <th>hasta</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $intervalosSeccionesAgrupados = \Illuminate\Support\Facades\DB::table('IntervalosSecciones')
            ->select('desde','hasta',\Illuminate\Support\Facades\DB::raw('count(*) as total'))
            ->where('seccion_id',$seccion->id)
            ->groupBy('desde','hasta')
            ->get();
        foreach ($intervalosSeccionesAgrupados as $intervaloSeccionAgrupado){
            $intervaloSeccionAgrupado->dias = \Illuminate\Support\Facades\DB::table('IntervalosSecciones')
                ->select('id','dia')
                ->where([
                    ['desde',$intervaloSeccionAgrupado->desde],
                    ['seccion_id','=',$seccion->id],
                ])
                ->get();
        }
    ?>
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
        </tr>
    @endforeach
    </tbody>
</table>