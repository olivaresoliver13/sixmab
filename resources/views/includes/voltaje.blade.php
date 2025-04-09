<div id="voltaje">
    <div class="row">
        <head>                                                    
            <div class="container-fluid" id="container2" style="height: 400px; min-width: 100%"></div>
            <script>
                var chart_voltaje = Highcharts.stockChart('container2', {
                    chart: {
                        
                        events: {
                            load: function () {
                            }
                        }
                    },
                    time: {
                        useUTC: true
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

                    title: {
                        text: 'Voltaje Total [ V ]'
                    },

                    xAxis: {
                        type: 'datetime',
                        tickPixelInterval: 150
                    },

                    yAxis: {
                        title: {
                            text: 'Voltaje Total [ V ]'
                        },
                        
                        plotLines: [{
                            value: {{($disp->voltaje_min * $bateria->cantidad_celda)}},
                            color: 'red',
                            dashStyle: 'shortdash',
                            width: 2,
                            label: {
                                text: ''
                            }
                        }, {
                            value: {{($disp->voltaje_max * $bateria->cantidad_celda)}},
                            color: 'green',
                            dashStyle: 'shortdash',
                            width: 2,
                            label: {
                                text: ''
                            }
                        }]
                    },

                    tooltip: {
                        headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                        pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje Total:</b> {point.y:.2f} [ V ]'
                    },

                    exporting: {
                        enabled: true
                    },

                    series: []
                });
            </script>
        </head>
    </div>  
    <div class="d-flex flex-row justify-content-end">
        <div class="row">
            <div class="col-sm-3 col-6">
                <div class="border-right tooltipsC" title="Voltaje Máximo * Cantidad Celdas">
                    <span class="description-text text-success"> Voltaje Máximo: </span>
                    <span class="description-percentage">
                        {{$disp->voltaje_max * $bateria->cantidad_celda}} [ V ]
                    </span>
                </div>
            </div>

            <div class="col-sm-3 col-6">
                <div class="tooltipsC" title="Voltaje Mínimo * Cantidad Celdas">
                    <span class="description-text text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Voltaje Mínimo: </span>
                    <span class="description-percentage">
                        {{$disp->voltaje_min * $bateria->cantidad_celda}} [ V ]
                    </span>
                </div>
            </div>
        </div>
    </div>          
</div>