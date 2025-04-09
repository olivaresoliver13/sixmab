<div id="temperatura">            
    <div class="row">
        <head>
            <div class="container-fluid" id="container3" style="height: 400px; min-width: 100%"></div>
            <script>
                let chart_temperatura = Highcharts.chart('container3', 
                {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Temperatura [ °C ]'
                    },
                    subtitle: {
                        text: ''
                    },
                    accessibility: {
                        announceNewData: {
                            enabled: true
                        }
                    },

                    xAxis: {
                        type: 'category'
                    },

                    yAxis: {
                        title: {
                            text: 'Temperatura [ °C ]'
                        },
                        plotLines: [{
                            value: {{$disp->temperatura_min}},
                            color: 'red',
                            dashStyle: 'shortdash',
                            width: 2,
                            label: {
                                text: ''
                            }
                        }, {
                            value: {{$disp->temperatura_max}},
                            color: 'green',
                            dashStyle: 'shortdash',
                            width: 2,
                            label: {
                                text: ''
                            }
                        }]
                    },

                    legend: {
                        enabled: false
                    },
                    plotOptions: {
                        series: {
                            borderWidth: 0,
                            dataLabels: {
                                enabled: true,
                                format: '{point.y:.2f}'
                            }
                        }
                    },

                    tooltip: {
                        headerFormat: '',
                        pointFormat: '<b>{point.name}:</b> {point.y:.2f} °C'
                    },

                    series: [],
                    
                    drilldown:{
                        series: []
                    }
                });
            </script>
        </head>
    </div>
    <div class="d-flex flex-row justify-content-end tl">
        <div class="row">
            <div class="col-sm-3 col-6">
                <div class="border-right">
                    <span class="description-text text-success"> Temperatura Máxima: </span>
                    <span class="description-percentage">
                        {{$disp->temperatura_max}} [ °C ]
                    </span>
                </div>
            </div>

            <div class="col-sm-3 col-6">
                <div>
                    <span class="description-text text-danger">&nbsp;&nbsp;&nbsp;Temperatura Mínima: </span>
                    <span class="description-percentage">
                        {{$disp->temperatura_min}} [ °C ]
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>