@extends('layouts.layouts')

<link rel="stylesheet" href="{{asset('css/component-linea-tiempo.css')}}">
<link rel="stylesheet" href="{{asset('css/ps-tabla.css')}}">

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/eliminar.js")}}" type="text/javascript"></script>
@stop  

@section('titulo')
    <div class="col-sm-6 float-right po1 tps" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right cab-ico po2 tpo2">
            <spam class="mr-2">Empresa:</spam>    
            <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $maquinaria->planta->empresa->id])}}">{{$maquinaria->planta->empresa->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta->id])}}">{{$maquinaria->planta->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('baterias.pasosixmab.index', ['bateria' => $bateria->id])}}">{{$maquinaria->siglas}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$bateria->siglas}}</li>
            <li class="breadcrumb-item">{{ __('adminlte::adminlte.steps') }}</li>
        </ol>
    </div>
    <div class="ico-sixmab1">
        <img alt="" class="header-ico" src="{{asset('img/sixmab.png')}}" style="width: 1.5em; float: left;"/>
        <span class="ml-2">Diagnóstico</span>
    </div>
    <div class="w-100 alto1 alto2"> 
        @can('diagnostico.create')
            <div class="box-header with-border">            
                <a href="{{route('baterias.diagnostico.create', ['bateria' => $bateria->id])}}" class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.create-record') }}</span></a>
            </div>
        @endcan   

        <a href="{{route('baterias.pasosixmab.index', ['bateria' => $bateria->id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>    </div>
@stop

@section('contenido')
    @include('includes.mensaje')
    @if(count($diagnostico)>0)
        <div class="box-body">
            <div id="pricing-table">
                <div class="row">
                    <div class="col-12">
                        <hr>
                        <span style="font-size: 20px; text-align: left; position: relative;">
                            Número de Batería: {{$bateria->numero_bateria}}
                        </span>
                        <hr>
                        <div class="card-body">
                            <div class="container" style="max-width: 90%;">
                                <div class="main">
                                    @foreach ($diagnostico as $item)
                                        <ul class="cbp_tmtimeline">
                                            <li>                                            
                                                <time class="cbp_tmtime" datetime="2013-04-10 18:30"><span style="margin-right: 20px !important;">{{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</span> <span>{{ \Carbon\Carbon::parse($item->created_at)->format('H:i:s')}}</span></time>
                                                <div class="cbp_tmicon"></div>
                                                <div class="cbp_tmlabel">   
                                                    <table>
                                                        <tbody>
                                                            <tr>
                                                                @can('diagnostico.destroy')
                                                                    <div class="box-header">            
                                                                        <form action="{{route('diagnostico.destroy', ['diagnostico' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                                                                            @csrf @method("delete")
                                                                            <button type="submit" class="pull-right tooltipsC" title="Eliminar Registro" style="border: 0; background: transparent; color: red;">
                                                                                <i class="fas fa-trash-alt"></i>
                                                                            </button>
                                                                        </form>   
                                                                    </div>
                                                                @endcan  
                                                            </tr>
                                                            <tr>
                                                                @can('diagnostico.edit')
                                                                    <div class="box-header">            
                                                                        <a href="{{route('diagnostico.edit', ['diagnostico' => $item->id])}}" class="pull-right tooltipsC" title="Editar Registro" style="border: 0; background: transparent; margin-right: 12px; color: #ffc107;">
                                                                            <i class="fas fa-edit"></i>
                                                                        </a>
                                                                    </div>
                                                                @endcan  
                                                            </tr>
                                                                <h6>Mediciones en Carga por Batería</h6>
                                                            <hr>
                                                            <tr>  
                                                                <td style="width: 240px"><span style="font-weight: bold;">Gravedad Especifica: </span> {{$item->gravedad_especifica}} kg/dm3</td>
                                                                <td><span style="font-weight: bold;">Voltaje: </span> {{$item->voltaje}} Volts</td>
                                                                <td><span style="font-weight: bold;">Temperatura: </span> {{$item->temperatura}} °</td>
                                                                <td><span style="font-weight: bold;">Corriente: </span> {{$item->corriente_ac_dc}} Amperes</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table>
                                                        <tbody>
                                                            <hr>
                                                                <h6>Programa de Descarga</h6>
                                                            <hr>
                                                            <tr>
                                                                <td><span style="font-weight: bold;">Hora: </span> {{ \Carbon\Carbon::parse($item->hora)->format('H:i:s')}}</td>
                                                                <td><span style="font-weight: bold;">Corriente: </span> {{$item->corriente}} AMPERES</td>
                                                                <td><span style="font-weight: bold;">Voltaje de Corte: </span> {{$item->temperatura}} VOLTS</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table>
                                                        <tbody>
                                                            <hr>
                                                                <h6>Datos Pre-Regeneración</h6>
                                                            <hr>
                                                            <tr>
                                                                <td><span style="font-weight: bold;">Tiempo de Descarga: </span> {{ \Carbon\Carbon::parse($item->tiempo_descarga)->format('H:i:s')}}</td>
                                                                <td><span style="font-weight: bold;">Capacidad: </span> {{$item->capacidad}} amperes horas</td>
                                                                <td><span style="font-weight: bold;">Eficiencia: </span> {{$item->eficiencia}} %</td>                                                                
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table>
                                                        <tbody>
                                                            <hr>
                                                            @if($bateria->tipo_bateria_id == 3)
                                                                <td><span style="font-weight: bold;">CCA - COLD CRANKING AMPERES: </span> {{$item->cca_cold_cranking_ampere}}</td>
                                                            @endif 
                                                            @if($bateria->tipo_bateria_id == 1)
                                                                <td><span style="font-weight: bold;">Impedancia: </span> {{$item->impedancia}}</td>
                                                            @endif     
                                                            <hr>                                                                
                                                        </tbody>
                                                    </table>    
                                                </div>                                                    
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <br><br>
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
                <font style="vertical-align: inherit;">No se encuentran registros para este periodo.</font>
                <font style="vertical-align: inherit;"><br>Por favor ingrese un Diagnóstico.</font>
            </font>
        </div>
    @endif
@stop