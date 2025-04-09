<p>{!!$mensaje!!}</p>
<div class="text-center">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th scope="col" class="align-middle" style="text-align: center !important;">Codigo</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">Voltaje nominal</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">Capacidad nominal</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">Descarga nominal</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[V] </th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[A] </th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[°C] </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mediciones as $fila)
                <tr>  
                    <td>{{$fila['bateria']->numero_bateria}}</td>
                    <td class="text-center">{{$fila['bateria']->voltaje_nominal}}</td>
                    <td class="text-center">{{$fila['bateria']->capacidad_nominal}}</td>
                    <td class="text-center">{{$fila['bateria']->descarga_nominal}}</td> 
                    @if (count($fila['mediciones']) > 0)  
                        <td class="text-center">{{imprimirDato($fila['mediciones']->avg('voltajeTotal'))}}</td>
                        <td class="text-center">{{imprimirDato($fila['mediciones']->avg('corriente'))}}</td>
                        <td class="text-center">{{imprimirDato($fila['mediciones']->avg('temperaturaPromedio'))}}</td>
                    @else
                        <td>Sin registro</td>
                        <td>Sin registro</td>
                        <td>Sin registro</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>