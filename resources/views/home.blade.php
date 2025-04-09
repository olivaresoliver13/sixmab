@extends('layouts.layouts')

@section('titulo')
    <h1 class="m-0 text-dark"><i class="fas fa-tachometer-alt"></i>&ensp;Tablero de Control</h1>
@stop

<link rel="stylesheet" href="{{asset("css/sytles-grafico.css")}}">

@section('content')
    <br>
    <div class="container-fluid">
        <center>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box tooltipsC" title="Empresa">
                        <span class="info-box-icon bg-info elevation-1">
                            <i class="fas fa-building"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Empresa</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 tooltipsC" title="Planta">
                        <span class="info-box-icon bg-danger elevation-1">
                            <i class="fas fa-city"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Planta</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 tooltipsC" title="Sistema (Maquinaria)">
                        <span class="info-box-icon bg-success elevation-1">
                            <img alt="" src="{{asset('img/ts-n1.png')}}" style="width: 1.5em;"/>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Maquinaria</li></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3 tooltipsC" title="Batería">
                        <span class="info-box-icon bg-warning elevation-1">
                            <i class="fas fa-car-battery fa-lg" style="color: #ffffff;"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Batería</span>
                        </div>
                    </div>
                </div>
            </div>            
        </center>

        <div class="container-fluid">
            <div class="row" style="margin-right: 0px; margin-left: 0px;">
                <div class="col-lg-6">
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

                                    <div id="usuario">          
                                        <script>
                                            Highcharts.chart('usuario', 
                                            {
                                                chart: 
                                                {
                                                    type: 'line'
                                                },
                                                title: 
                                                {
                                                    text: 'Usuarios'
                                                },
                                                subtitle: 
                                                {
                                                    text: ''
                                                },
                                                xAxis: 
                                                {
                                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                                                },
                                                yAxis: 
                                                {
                                                    title: 
                                                    {
                                                        text: 'Usuarios'
                                                    }
                                                },
                                                plotOptions: 
                                                {
                                                    line: 
                                                    {
                                                        dataLabels: 
                                                        {
                                                            enabled: true
                                                        },
                                                        enableMouseTracking: false
                                                    }
                                                },
                                                series: [
                                                    {
                                                    name: 'Usuarios',
                                                    data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                                                }]
                                            });
                                        </script>
                                    </div>
                                </head>
                            </div>
                            <div class="d-flex flex-row justify-content-end">
                            <!-- /.Pie -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between"></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex"></div>
                            <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <head>            
                                <div id="seccion">          
                                    <script>
                                        Highcharts.chart('seccion', 
                                            {
                                                chart: 
                                                {
                                                    type: 'pie',
                                                    options3d: 
                                                    {
                                                        enabled: true,
                                                        alpha: 45,
                                                        beta: 0
                                                    }
                                                },
                                                title: 
                                                {
                                                    text: 'Secciones'
                                                },
                                                accessibility: 
                                                {
                                                    point: {
                                                        valueSuffix: '%'
                                                    }
                                                },
                                                tooltip: 
                                                {
                                                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                                },
                                                plotOptions: 
                                                {
                                                    pie: {
                                                        allowPointSelect: true,
                                                        cursor: 'pointer',
                                                        depth: 35,
                                                        dataLabels: {
                                                            enabled: true,
                                                            format: '{point.name}'
                                                        }
                                                    }
                                                },
                                                series: [
                                                    {
                                                    type: 'pie',
                                                    name: 'Browser share',
                                                    data: [
                                                        ['Usuarios Activos', 45.0],
                                                        ['Usuarios Inactivos', 26.8],
                                                        ['Usuarios Inactivos', 16.4]
                                                    ]
                                                }]
                                            });              
                                    </script>
                                </div>
                            </head>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop