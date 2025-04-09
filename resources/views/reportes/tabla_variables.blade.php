<p>{!!$mensaje!!}</p>
<div class="text-center">
    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th scope="col" class="align-middle" style="text-align: center !important;">Codigo</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[V] actual</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[V] min</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[V] max</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[A] actual</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[A] min</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[A] max</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[°C] actual</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[°C] min</th>
                    <th scope="col" class="align-middle" style="text-align: center !important;">[°C] max</th>
                </tr>
            </thead>
            <tbody>    
                @forelse ($mediciones as $fila)
                    <tr>
                        <td>{{$fila['bateria']->numero_bateria}}</td>

                        @if (count($fila['mediciones']) > 0)
                            <td class="text-center">{{imprimirDato($fila['mediciones']->last()->voltajeTotal)}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->min('voltajeTotal'))}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->max('voltajeTotal'))}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->last()->corriente)}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->min('corriente'))}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->max('corriente'))}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->last()->temperaturaPromedio)}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->min('temperaturaPromedio'))}}</td>
                            <td class="text-center">{{imprimirDato($fila['mediciones']->max('temperaturaPromedio'))}}</td>
                        @else
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                            <td>Sin registro</td>
                        @endif      
                    </tr>
                    @empty 
                @endforelse                  
            </tbody>
        </table>
    </div>
</div>