<div style="background-color: #ffffffbf">
    <div class="text-justify">
        <p>&nbsp; &nbsp; &nbsp; A continuación se observan las variables medidas que no estuvieron dentro de los límites establecidos, fue emitida el {{$data['fecha']}} a las {{$data['hora']}} en la batería de codigo: <span style="font-weight: bold;">{{$data['bateria']}}</span>. Los límites establecidos para esta batería son:</p>
    </div>
    <br>
    <table class="table table-bordered table-condensed text-center">
        <tr style="background-color:#cdcdce">
            <th>Descripción</th>
            <th>Mínimo</th>
            <th>Máximo</th>
        </tr>
        <tr>  
            <td class="text-left">Voltaje [ V ]</td>
            <td>{{$data['medicion']->limites_voltaje['min']}}</td>
            <td>{{$data['medicion']->limites_voltaje['max']}}</td>
        </tr>
        <tr>  
            <td class="text-left">Voltaje total [ V ]</td>
            <td>{{$data['medicion']->limites_voltajeTotal['min']}}</td>
            <td>{{$data['medicion']->limites_voltajeTotal['max']}}</td>
        </tr>
        <tr>  
            <td class="text-left">Corriente [ A ]</td>
            <td>{{$data['medicion']->limites_corriente['min']}}</td>
            <td>{{$data['medicion']->limites_corriente['max']}}</td>
        </tr>
        <tr>  
            <td class="text-left">Temperatura [ °C ]</td>
            <td>{{$data['medicion']->limites_temperatura['min']}}</td>
            <td>{{$data['medicion']->limites_temperatura['max']}}</td>
        </tr>
    </table>
    <br>
    <div class="text-justify">
        El voltaje total de la batería esta 
        @if ($data['medicion']->voltajeTotal > $data['medicion']->limites_voltajeTotal['max'])
            sobre
        @elseif ($data['medicion']->voltajeTotal < $data['medicion']->limites_voltajeTotal['min'])
            bajo
        @else
            dentro de
        @endif
            los límites con un valor de: <span style="font-weight: bold;">{{$data['medicion']->voltajeTotal}}</span> [ V ].
    </div>
    <br>
    <div class="text-justify">
        La corriente esta 
        @if ($data['medicion']->corriente > $data['medicion']->limites_corriente['max'])
            sobre
        @elseif ($data['medicion']->corriente < $data['medicion']->limites_corriente['min'])
            bajo
        @else
            dentro de
        @endif
            los límites con un valor de: <span style="font-weight: bold;">{{$data['medicion']->corriente}}</span> [ A ].
    </div>
    <br>
    @foreach ($data['medicion']->temperaturas_anomalos as $tipo => $anomalos)
        <div class="text-justify">
            Las temperaturas que estan {{$tipo == 'sup' ? 'sobre' : 'bajo'}} los límites son las siguientes:
        </div>
        <br>
        @if (count($anomalos) > 0)
            <table class="table table-bordered table-condensed text-center">
                <tr style="background-color:#cdcdce">
                    <th>Temperatura</th>
                    <th>Valor [ °C ]</th>
                </tr>
                @foreach ($anomalos as $celda => $valor)
                    @if($valor != "")
                        <tr>  
                            <td class="text-left">Temperatura: {{str_replace("temperatura", '',$celda) +1}}</td>
                            <td>{{$valor}}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
        @else
            <h5>No presenta.</h5><br>
        @endif
    @endforeach
    <br>
    @foreach ($data['medicion']->voltajes_anomalos as $tipo => $anomalos)
        <div class="text-justify">
            Los voltajes que estan {{$tipo == 'sup' ? 'sobre' : 'bajo'}} los límites son los siguientes:
        </div>
        <br>
        @if (count($anomalos) > 0)
            <table class="table table-bordered table-condensed text-center">
                <tr style="background-color:#cdcdce">
                    <th>Voltaje en la Celda</th>
                    <th>Valor [ V ]</th>
                </tr>
                @foreach ($anomalos as $celda => $valor)
                    @if($valor != "")
                        <tr>  
                            <td class="text-left">Voltaje: {{str_replace("voltaje", '',$celda) +1}}</td>
                            <td>{{$valor}}</td>
                        </tr>   
                    @endif
                @endforeach
            </table>

        @else
            <h5>No presenta.</h5><br>
        @endif
    @endforeach
</div>