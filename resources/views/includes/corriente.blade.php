<div id="corriente"> 
    <div class="row">
        <head>
            <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
            <script>      
                function transformar_fecha(date)
                {
                    let comp = date.split(' ');
                    let fecha = comp[0].split('-');
                    let hora = comp[1].split(':');

                    return Date.UTC(fecha[0], fecha[1] - 1, fecha[2], hora[0], hora[1], hora[2]);
                }

                $(document).ready(function()
                {
                    let corrientes = [];
                    let voltajes = [];
                    let ult_medicion;
                    $.get('{{route('monitoreo.mediciones', ['bateria' => $bateria])}}', (mediciones) => {
                        corrientes = mediciones.map( (medicion) => {
                            let hora = transformar_fecha(medicion.created_at);
                            let corriente = parseFloat(medicion.corriente);

                            return {x: hora, y: corriente};
                        });

                        voltajes = mediciones.map( (medicion) => {
                            let hora = transformar_fecha(medicion.created_at);
                            let voltaje = parseFloat(medicion.voltajeTotal);

                            return {x: hora, y: voltaje};
                        });

                        ult_medicion = mediciones[mediciones.length - 1];

                        let temperatura = parseFloat(ult_medicion.temperatura0);

                        chart_corriente.addSeries({
                        name: "",
                        marker: {
                            enabled:false
                        },
                        data: corrientes
                        });

                        chart_voltaje.addSeries({
                        name: "",
                        marker: {
                            enabled:false
                        },
                        data: voltajes
                        });

                        let i = 1;
                        let data_temp = [];

                        var variable_temperatura = <?php echo $bateria->cantidad_temperatura; ?>

                        for (let i = 0; i < variable_temperatura; i++) {
                            
                            let temp = parseFloat(ult_medicion['temperatura'+i]);
                            data_temp.push({
                                name: "Temperatura " + (i +1),
                                y: temp
                            });
                        }

                        chart_temperatura.addSeries({
                            name: "Bateria",
                            colorByPoint: false,
                            data:   data_temp
                        });

                        // funciona ajax añadir puntos al grafico

                    });
                    
                    // agregar punto al grafico

                    setInterval( function()
                    {
                        var url = '{{route('monitoreo.medicion', ['bateria' => $bateria])}}/'+ult_medicion.id;
                        $.get(url, (medicion) => {
                            if(medicion != 0){
                                let hora = transformar_fecha(medicion.created_at);
                                let corriente = parseFloat(medicion.corriente);
                                let voltaje = parseFloat(medicion.voltajeTotal);

                                let series_voltaje = chart_voltaje.series[0];
                                let series_corriente = chart_corriente.series[0];

                                series_voltaje.addPoint([hora, voltaje], true, false);

                                series_corriente.addPoint([hora, corriente], true, false);
                                
                                ult_medicion = medicion;

                                let series_temperatura = [];


                                var variable_temperatura1 = <?php echo $bateria->cantidad_temperatura; ?>
    
                                for (let i = 0; i < variable_temperatura1; i++) {
                                    let temp = parseFloat(ult_medicion['temperatura'+i]);
                                    series_temperatura.push({
                                        name: "Temperatura " + (i +1),
                                        y: temp,
                                        drilldown: true
                                    });
                                }
                                chart_temperatura.series[0].remove();

                                chart_temperatura.addSeries({
                                    name: "Bateria",
                                    colorByPoint: false,
                                    data:   series_temperatura
                                });
                            }
                        });
                    }, 10000);
                });
            </script>

            <script src="{{asset('js/highcharts/highstock.js')}}"></script>
            <script src="{{asset('js/highcharts/exporting.js')}}"></script>
            <script src="{{asset('js/highcharts/offline-exporting.js')}}"></script>
            <script src="{{asset('js/highcharts/export-data.js')}}"></script>
            <script src="{{asset('js/highcharts/data.js')}}"></script>
            
            <div class="container-sm" id="container" style="height: 400px; min-width: 100%"></div>
            
            <script>
                var chart_corriente = Highcharts.stockChart('container', {
                
                    time: {
                        useUTC: true
                    },

                    title: {
                        text: 'Corriente [ A ]'
                    },

                    rangeSelector: {
                        buttons: [{
                            count: 3,
                            type: 'minute',
                            text: '3m'
                        },{
                            count: 6,
                            type: 'minute',
                            text: '6m'
                        },{
                            count: 15,
                            type: 'minute',
                            text: '15m'
                        },{
                            count: 30,
                            type: 'minute',
                            text: '30m'
                        },{
                            type: 'all',
                            text: 'Todo'
                        }],
                        inputEnabled: false,
                        selected: 0
                    },

                    xAxis: {
                        type: 'datetime',
                        tickPixelInterval: 150
                    },

                    yAxis: {
                        title: {
                            text: 'Corriente [ A ]'
                        },
                        plotLines: [{
                            value: {{$disp->corriente_min}},
                            color: 'red',
                            dashStyle: 'shortdash',
                            width: 2,
                            label: {
                                text: ''
                            }
                        }, {
                            value: {{$disp->corriente_max}},
                            color: 'green',
                            dashStyle: 'shortdash',
                            width: 2,
                            label: {
                                text: ''
                            }
                        }]
                    },

                    tooltip: {
                        headerFormat: '<b>{point.y:.2f} [ A ]</b>',
                        pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Corriente:</b> {point.y:.2f} [ A ]'
                    },

                    exporting: {
                        enabled: true
                    },

                    series: []
                });
            </script>
        </head>
    </div>
    <div class="d-flex flex-row justify-content-end tl">
        <div class="row">
            <div class="col-sm-3 col-6">
                <div class="border-right">
                    <span class="description-text text-success"> Corriente Máxima: </span>
                    <span class="description-percentage">
                        {{$disp->corriente_max}} [ A ]
                    </span>
                </div>
            </div>

            <div class="col-sm-3 col-6">
                <div>
                    <span class="description-text text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Corriente Mínima: </span>
                    <span class="description-percentage">
                        {{$disp->corriente_min}} [ A ]
                    </span>
                </div>
            </div>   
        </div>
    </div>
</div>