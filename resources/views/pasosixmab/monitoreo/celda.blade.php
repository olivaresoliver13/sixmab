@extends('layouts.layouts')

<link rel="stylesheet" href="{{asset("css/sytles-grafico.css")}}">

@section('titulo')
    <div class="col-sm-6 float-right" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $maquinaria->planta->empresa->id])}}">{{$maquinaria->planta->empresa->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta->id])}}">{{$maquinaria->planta->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="">{{$maquinaria->siglas}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{$bateria->siglas}}</li>
            <li class="breadcrumb-item active">Celda</li>
        </ol>
    </div>
    <div class="w-100 alto1 header-ico">
        <i class="fa fa-bar-chart-o"></i>&ensp;{{ __('adminlte::adminlte.online-monitoring') }}
    </div>

    <div class="w-100 alto1 alto2 mlinea-01">
        <div class="box-header with-border">
            <a href="{{route('monitoreo.celdas', ['bateria' => $bateria->id, ])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1" style="width: 130px;"><i class="fa fa-fw fa-reply-all"></i>{{ __('adminlte::adminlte.return') }}</a>
        </div>
    </div>
@stop

@section('contenido')
    <br>
    <div class="container-fluid">
        <center>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{route('empresas.plantas.index', ['empresa' => $maquinaria->planta->empresa->id])}}">
                        <div class="info-box tooltipsC" title="Empresa">
                            <span class="info-box-icon bg-info elevation-1">
                                <i class="fas fa-building"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{$maquinaria->planta->empresa->siglas}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta->id])}}">
                        <div class="info-box mb-3 tooltipsC" title="Planta">
                            <span class="info-box-icon bg-danger elevation-1">
                                <i class="fas fa-city"></i>
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">{{$maquinaria->planta->siglas}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{route('maquinarias.baterias.index', ['maquinaria' => $maquinaria->id])}}">
                            <div class="info-box mb-3 tooltipsC" title="Sistema (Maquinaria)">
                                <span class="info-box-icon bg-success elevation-1">
                                    <img alt="" src="{{asset('img/ts-n1.png')}}" style="width: 1.5em;"/>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{$maquinaria->siglas}}</li></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{route('baterias.pasosixmab.index', ['bateria' => $bateria->id])}}">
                            <div class="info-box mb-3 tooltipsC" title="Batería">
                                <span class="info-box-icon bg-warning elevation-1">
                                    <i class="fas fa-car-battery fa-lg" style="color: #ffffff;"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{$bateria->siglas}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </center>
        
        <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2" style="background: black;">
                <ul class="nav nav-pills">
                  <li class="nav-item" style="color: #ffffff;">Voltaje Celda {{$celda}}</li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
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
                                            let voltajes = [];
                                            let ult_medicion;
                                            $.get('{{route('monitoreo.mediciones', ['bateria' => $bateria])}}', (mediciones) => {
            
                                                voltajes = mediciones.map( (medicion) => {
                                                    let hora = transformar_fecha(medicion.created_at);
                                                    let voltaje = parseFloat(medicion['voltaje'+{{$celda - 1}}]);
            
                                                    return {x: hora, y: voltaje};
                                                });
            
                                                ult_medicion = mediciones[mediciones.length - 1];
            
                                                chart_voltaje.addSeries({
                                                name: "",
                                                marker: {
                                                    enabled:false
                                                },
                                                data: voltajes
                                                });
            
                                                let i = 1;
                                                let data_temp = [];
            
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
                                                        let voltaje = parseFloat(medicion['voltaje'+{{$celda - 1}}]);
            
                                                        let series_voltaje = chart_voltaje.series[0];
            
                                                        series_voltaje.addPoint([hora, voltaje], true, false);
                                                        
                                                        ult_medicion = medicion;
                                                    }
                                                });
                                            }, 10000);
                                        });
                                    </script>

                                    <script src="{{asset('js/highcharts/highstock.js')}}"></script>
                                    <script src="{{asset('js/highcharts/exporting.js')}}"></script>
                                    <script src="{{asset('js/highcharts/offline-exporting.js')}}"></script>
                                    <script src="{{asset('js/highcharts/export-data.js')}}"></script>
                                    <script src="{{asset('js/highcharts/series-label.js')}}"></script>
                                    <script src="{{asset('js/highcharts/data.js')}}"></script>
                                                
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
                                                text: 'Voltaje Celda {{$celda}}'
                                            },
            
                                            xAxis: {
                                                type: 'datetime',
                                                tickPixelInterval: 150
                                            },
            
                                            yAxis: {
                                                title: {
                                                    text: 'Voltaje Celda {{$celda}}'
                                                },

                                                min: {{$disp->voltaje_min}},
                                                max: {{$disp->voltaje_max}},
                                                
                                                plotLines: [{
                                                    value: {{$disp->voltaje_min}},
                                                    color: 'red',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje mínimo'
                                                    }
                                                }, {
                                                    value: {{$disp->voltaje_max}},
                                                    color: 'green',
                                                    dashStyle: 'shortdash',
                                                    width: 2,
                                                    label: {
                                                        text: 'Voltaje máximo'
                                                    }
                                                }]
                                            },
            
                                            tooltip: {
                                                headerFormat: '<b>{point.y:.2f} [ V ]</b>',
                                                pointFormat: '<b>Fecha:</b> {point.x:%d/%m/%Y <br/><b>Hora:</b> %H:%M:%S}<br/><b>Voltaje Celda {{$celda}}:</b> {point.y:.2f} [ V ]'
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
                                        <div class="description-block border-right">
                                            <span class="description-text text-success">Voltaje Máximo: </span>
                                            <span class="description-percentage">
                                                {{$disp->voltaje_max}}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-6">
                                        <div class="description-block border-right">
                                            <span class="description-text text-danger">Voltaje Mínimo: </span>
                                            <span class="description-percentage">
                                                {{$disp->voltaje_min}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop