@extends('layouts.layouts')

<link rel="stylesheet" href="{{asset("css/sytles-grafico.css")}}">

@section('titulo')
    <div class="col-sm-6 float-right" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $maquinaria->planta->empresa->id])}}">{{$maquinaria->planta->empresa->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta->id])}}">{{$maquinaria->planta->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('maquinarias.baterias.index', ['maquinaria' => $maquinaria->id])}}">{{$maquinaria->siglas}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$bateria->siglas}}</li>
            <li class="breadcrumb-item">Monitoreo</li>
        </ol>
    </div>
    <div class="w-100 alto1 header-ico">
        <i class="fa fa-bar-chart-o"></i>&ensp;{{ __('adminlte::adminlte.online-monitoring') }}
    </div>
    <div class="w-100 alto1 alto2 mlinea-01">
        <a href="{{route('monitoreo.index', ['bateria' => $bateria->id, ])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
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
        </center>

        @if(count($data)>0)
            <div class="w-100">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            @include('includes.corriente')
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            @include('includes.voltaje')
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">          
                            @include('includes.temperatura')
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info alert-dismissible" style="width:100%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">×</font>
                    </font>
                </button>
                <h5>
                    <i class="icon fas fa-info"></i>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">¡Mensaje de SIXMAB!</font>
                    </font>
                </h5>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">No se encuentran registros.</font>
                    <font style="vertical-align: inherit;"><br>Por favor verificar con el administrador del sistema.</font>
                </font>
            </div>
        @endif
    </div>
@stop