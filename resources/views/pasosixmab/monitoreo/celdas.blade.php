@extends('layouts.layouts')

@section('scripts')
    <script>
        $(document).ready(function(){
            let celdas = [];
            let ult_medicion;

            $.get('{{route('monitoreo.ultima_medicion', ['bateria' => $bateria])}}', (medicion) => {
                ult_medicion = medicion;
                let series_celdas = [];

                var variable_celdas = <?php echo $bateria->cantidad_celda; ?>

                for (let i = 0; i < variable_celdas; i++) {
                    
                    let celda = parseFloat(ult_medicion['voltaje'+i]);
                    series_celdas.push({
                        name: (i +1),
                        y: celda
                    });
                }

                chart_celdas.addSeries({
                    name: "Celdas",
                    colorByPoint: false,
                    data: series_celdas
                });
                // funciona ajax añadir puntos al grafico
            });
            
            // agregar punto al grafico
            setInterval( function(){
                var url = '{{route('monitoreo.ultima_medicion', ['bateria' => $bateria])}}';
                $.get(url, (medicion) => {
                    if(medicion != 0){
                        let hora = new Date(medicion.updated_at).getTime();
                    
                        if(medicion.voltajeTotal != null){ 
                            ult_medicion = medicion;
                        }
                        
                        let series_celdas = [];

                        var variable_celdas1 = <?php echo $bateria->cantidad_celda; ?>

                        for (let i = 0; i < variable_celdas1; i++) {
                            let celda = parseFloat(medicion['voltaje'+i]);
                            series_celdas.push({
                                name: (i +1),
                                y: celda,
                                drilldown: false
                            });
                        }

                        chart_celdas.series[0].remove();

                        chart_celdas.addSeries({
                            name: "Celdas",
                            colorByPoint: false,
                            data:   series_celdas
                        });
                    }
                });
            }, 10000);
        });
    </script>
@stop

@section('titulo')
    <div class="col-sm-6 float-right" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $maquinaria->planta->empresa->id])}}">{{$maquinaria->planta->empresa->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta->id])}}">{{$maquinaria->planta->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="">{{$maquinaria->siglas}}</a></li>
            <li class="breadcrumb-item" aria-current="page">{{$bateria->siglas}}</li>
            <li class="breadcrumb-item active">Celdas</li>
        </ol>
    </div>
    <div class="w-100 alto1 header-ico">
        <i class="fa fa-bar-chart-o"></i>&ensp;{{ __('adminlte::adminlte.online-monitoring') }}
    </div>

    <div class="w-100 alto1 alto2 mlinea-01">
        <div class="box-header with-border">
            <a href="{{route('monitoreo.index', ['bateria' => $bateria->id, ])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1" style="width: 130px;"><i class="fa fa-fw fa-reply-all"></i>{{ __('adminlte::adminlte.return') }}</a>
        </div>
    </div>
@stop

<link rel="stylesheet" href='{{asset("css/sytles-grafico.css")}}'>

@section('contenido')
    <br>
    <div class="row">
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
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{route('maquinarias.baterias.index', ['maquinaria' => $maquinaria->id])}}">
                            <div class="info-box mb-3 tooltipsC" title="Sistema (Maquinaria)">
                                <span class="info-box-icon bg-success elevation-1">
                                    <i class="fas fa-bus"></i>
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
                                    <i class="fas fa-car-battery"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">{{$bateria->siglas}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>  
            </center>
        

            <div class="container-fluid">
                @include('includes.pestana-celdas')
                <div class="row">
                    <div class="w-100">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between"></div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex"></div>
                                    <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                    <head>
                                        <script src="{{asset('js/highcharts/highstock.js')}}"></script>
                                        <script src="{{asset('js/highcharts/exporting.js')}}"></script>
                                        <script src="{{asset('js/highcharts/offline-exporting.js')}}"></script>
                                        <script src="{{asset('js/highcharts/export-data.js')}}"></script>
                                        <script src="{{asset('js/highcharts/series-label.js')}}"></script>
                                        <script src="{{asset('js/highcharts/data.js')}}"></script>

                                        <figure class="highcharts-figure">
                                            <div class="container-fluid" id="container" style="height: 400px; min-width: 310px">
                                                <p class="highcharts-description">
                                                    <script>
                                                        let chart_celdas = Highcharts.chart('container', {
                                                            chart: {
                                                                    type: 'column'
                                                                },
                                                                title: {
                                                                    text: 'Voltaje por Celda'
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
                                                                        text: 'Voltaje por Celda'
                                                                    },
                                                                    plotLines: [{
                                                                        value: {{$disp->voltaje_min}}, 
                                                                        color: 'red',
                                                                        dashStyle: 'shortdash',
                                                                        width: 2,
                                                                        label: {
                                                                            text: 'Voltaje Mínimo'
                                                                        }
                                                                    }, {
                                                                        value: {{$disp->voltaje_max}}, 
                                                                        color: 'green',
                                                                        dashStyle: 'shortdash',
                                                                        width: 2,
                                                                        label: {
                                                                            text: 'Voltaje Máximo'
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
                                                                    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                                                                    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f} V</b> of total<br/>'
                                                                },
                                                            
                                                                series: []
                                                            });
                                                    </script>
                                                </p>
                                            </div>
                                        </figure>
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
    </div>
@stop