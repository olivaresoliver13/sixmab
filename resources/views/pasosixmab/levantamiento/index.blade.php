@extends('layouts.layouts')

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/eliminar.js")}}" type="text/javascript"></script>
@endsection

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
        <span class="ml-2 l-23">Levantamiento</span>
    </div>
    <div class="w-100 alto1 alto2">
        @if(count($boton)>0)
            @can('levantamiento.edit')
                <div class="box-header with-border">            
                    <a href="{{route('levantamiento.edit', ['levantamiento' => $levantamiento->id])}}" class="btn btn-warning btn-sm pull-right mr-1 rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">Editar</span></a>
                </div>
            @endcan  
        @else
            @can('levantamiento.create')
                <div class="box-header with-border">            
                    <a href="{{route('baterias.levantamiento.create', ['bateria' => $bateria->id])}}" class="btn btn-success btn-sm pull-right mr-1 rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.create-record') }}</span></a>
                </div>
            @endcan   
        @endif

        <a href="{{route('baterias.pasosixmab.index', ['bateria' => $bateria->id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
@stop

<style>
    .content {
        position: relative;
        top: 10px;
        width: 90%;
        margin: 0 auto;
    }
</style>

@section('contenido')
    @include('includes.mensaje')
    <div class="ls10">
        <div id="pricing-table">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="font-size: 20px; text-align: left; position: relative;">
                                <tbody>
                                    <tr>
                                        @isset($levantamiento->created_at) 
                                            @can('levantamiento.destroy')
                                                <div class="box-header with-border">            
                                                    <form action="{{route('levantamiento.destroy', ['levantamiento' => $levantamiento->id])}}" class="d-inline form-eliminar" method="POST">
                                                        @csrf @method("delete")
                                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;" title="Eliminar Registro">
                                                            <i class="fas fa-trash-alt mr-1 tam-ico"></i> Eliminar
                                                        </button>
                                                    </form>   
                                                </div>
                                            @endcan  
                                        @endisset
                                    </tr>
                                </tbody>
                                <strong>Fecha:</strong> @isset($levantamiento->created_at) {{ \Carbon\Carbon::parse($levantamiento->created_at)->format('d/m/Y H:i:s')}} @endisset
                            </div>
                            <hr>
                            <div id="pricing-table">
                                <div>
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><strong>Dueño de la batería:</strong> {{$maquinaria->planta->empresa->nombre}}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50"><strong>Nº de la batería:</strong> {{ $bateria->numero_bateria }}</td>
                                                <td class="w-50"><strong>Voltaje [ V ]:</strong> {{ $bateria->voltaje_nominal }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50"><strong>Nº de serie:</strong> {{ $bateria->numero_serie }}</td>
                                                <td class="w-50"><strong>Capacidad [ A.h ]:</strong> {{ $bateria->capacidad_nominal }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50"><strong>Marca:</strong> {{$bateria->marca->nombre}}</td>
                                                <td class="w-50"><strong>Tiempo de descarga	nominal [ h ]:</strong> {{$bateria->descarga_nominal}}</td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2">
                                                    @if ($bateria->tipo_bateria_id == 1)
                                                        <strong>Batería de {{$bateria->tipo_bateria->nombre}}:</strong> {{$bateria->cca_o_impedancia}} CCA
                                                    @elseif($bateria->tipo_bateria_id == 2)
                                                        <strong>Batería de {{$bateria->tipo_bateria->nombre}}</strong>
                                                    @elseif($bateria->tipo_bateria_id == 3)
                                                        <strong>Batería de {{$bateria->tipo_bateria->nombre}}:</strong> {{$bateria->cca_o_impedancia}} Impedancia [ohm]
                                                    @else
                                                        <strong>Batería de {{$bateria->tipo_bateria->nombre}}:</strong> {{$bateria->cca_o_impedancia}}
                                                    @endif 
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="top: 11px; position: relative;">
                                    <span style="float: right; right: 20px; position: relative; color: #8c8c8c;">Historial</span>
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><strong>Año de compra:</strong> @isset($levantamiento->fecha_compra) {{$levantamiento->fecha_compra}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Tipo de trabajo:</strong> @isset($levantamiento->tipo_trabajo->nombre) {{$levantamiento->tipo_trabajo->nombre}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Tipo de cuidado:</strong> @isset($levantamiento->tipo_cuidado->nombre) {{$levantamiento->tipo_cuidado->nombre}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Vasos cambiados:</strong> @isset($levantamiento->vaso_cambiado->nombre) {{$levantamiento->vaso_cambiado->nombre}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Fecha:</strong> @isset($levantamiento->fecha) {{ \Carbon\Carbon::parse($levantamiento->fecha)->format('d/m/Y')}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Notas:</strong> @isset($levantamiento->nota) {{$levantamiento->nota}} @endisset </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="top: 11px; position: relative;">
                                    <span style="float: right; right: 20px; position: relative; color: #8c8c8c;">Chequeo visual</span>
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <td colspan="2"><strong>Daños físicos:</strong> @isset($levantamiento->dano_fisico->nombre) {{$levantamiento->dano_fisico->nombre}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Fugas:</strong> @isset($levantamiento->fuga->nombre) {{$levantamiento->fuga->nombre}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Desbordamiento de ácido:</strong> @isset($levantamiento->desbordamiento_acido->nombre) {{$levantamiento->desbordamiento_acido->nombre}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Nivel bajo de electrólito:</strong> @isset($levantamiento->nivel_bajo_electrolito->nombre) {{$levantamiento->nivel_bajo_electrolito->nombre}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Puentes defectuosos/oxidados:</strong> @isset($levantamiento->puente_defectuoso_oxidado) {{$levantamiento->puente_defectuoso_oxidado}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Polos levantados:</strong> @isset($levantamiento->polo_levantado) {{$levantamiento->polo_levantado()}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Oxidación fuerte:</strong> @isset($levantamiento->oxidacion_fuerte) {{$levantamiento->oxidacion_fuerte()}} @endisset </td>
                                            </tr>
                                            <tr>
                                                <td  colspan="2"><strong>Otros:</strong> @isset($levantamiento->otro) {{$levantamiento->otro}} @endisset </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop