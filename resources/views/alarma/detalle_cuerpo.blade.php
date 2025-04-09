<br>
<div style="background-color: #ffffffbf">
    <div class="row p-4">
        <div class="col-md-12">
            <h5>A continuación se observan las variables medidas que no estuvieron dentro de los límites establecidos, fue emitida el {{$data['fecha']}} a las {{$data['hora']}} en la batería de codigo: <span style="font-weight: bold;">{{$data['bateria']}}</span>. Los límites establecidos para esta batería son:</h5>
        </div>
        <br><br><br>
        <div class="col-md-4">
            <table class="table table-bordered table-condensed text-center">
                <tr style="background-color:#cdcdce">
                    <th>Descripción</th>
                    <th>Máximo</th>
                    <th>Mínimo</th>
                </tr>
                <tr>  
                    <td class="text-left">Voltaje [ V ]</td>
                    <td>{{$data['medicion']->limites_voltaje['max']}}</td>
                    <td>{{$data['medicion']->limites_voltaje['min']}}</td>
                </tr>
                <tr>  
                    <td class="text-left">Voltaje total [ V ]</td>
                    <td>{{$data['medicion']->limites_voltajeTotal['max']}}</td>
                    <td>{{$data['medicion']->limites_voltajeTotal['min']}}</td>
                </tr>
                <tr>  
                    <td class="text-left">Corriente [ A ]</td>
                    <td>{{$data['medicion']->limites_corriente['max']}}</td>
                    <td>{{$data['medicion']->limites_corriente['min']}}</td>
                </tr>
                <tr>  
                    <td class="text-left">Temperatura [ °C ]</td>
                    <td>{{$data['medicion']->limites_temperatura['max']}}</td>
                    <td>{{$data['medicion']->limites_temperatura['min']}}</td>
                </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12 pl-4">
                <h5>
                    El voltaje total de la batería esta 
                        @if ($data['medicion']->voltajeTotal > $data['medicion']->limites_voltajeTotal['max'])
                            sobre
                        @elseif ($data['medicion']->voltajeTotal < $data['medicion']->limites_voltajeTotal['min'])
                            bajo
                        @else
                            dentro de
                        @endif
                            los límites con un valor de: <span style="font-weight: bold;">{{$data['medicion']->voltajeTotal}}</span> [ V ].
                        <br><br>
                </h5>
            </div>
            @foreach ($data['medicion']->voltajes_anomalos as $tipo => $anomalos)
                <div class="col-md-12 pl-4">
                    <h5>
                        Los voltajes que estan {{$tipo == 'sup' ? 'sobre' : 'bajo'}} los límites son los siguientes:
                    </h5>
                    <br>
                    @if (count($anomalos) > 0)
                        <table class="table table-bordered table-condensed text-center">
                            <tr style="background-color:#cdcdce">
                                <th>Descripción</th>
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
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h5>
                    La corriente esta 
                    @if ($data['medicion']->corriente > $data['medicion']->limites_corriente['max'])
                        sobre
                    @elseif ($data['medicion']->corriente < $data['medicion']->limites_corriente['min'])
                        bajo
                    @else
                        dentro de
                    @endif
                        los límites con un valor de: <span style="font-weight: bold;">{{$data['medicion']->corriente}}</span> [ A ].
                    <br><br>
                </h5>
            </div>
            @foreach ($data['medicion']->temperaturas_anomalos as $tipo => $anomalos)
                <div class="col-md-12">
                    <h5>
                        Las temperaturas que estan {{$tipo == 'sup' ? 'sobre' : 'bajo'}} los límites son las siguientes:
                    </h5>
                    <br>
                    @if (count($anomalos) > 0)
                        <table class="table table-bordered table-condensed text-center">
                            <tr style="background-color:#cdcdce">
                                <th>Descripción</th>
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
                </div>
            @endforeach
        </div>
    </div>
</div>