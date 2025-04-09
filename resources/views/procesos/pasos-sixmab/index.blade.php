@extends('layouts.layouts')

@section('titulo')
    <div class="col-sm-6 float-right po1 tps" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right cab-ico po2 tpo2">
            <spam class="mr-2">Empresa:</spam>    
            <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $maquinaria->planta->empresa->id])}}">{{$maquinaria->planta->empresa->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta->id])}}">{{$maquinaria->planta->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('maquinarias.baterias.index', ['maquinaria' => $maquinaria->id])}}">{{$maquinaria->siglas}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$bateria->siglas}}</li>
            <li class="breadcrumb-item">{{ __('adminlte::adminlte.steps') }}</li>
        </ol>
    </div>
    <div class="ico-sixmab1">
        <img alt="" class="header-ico" src="{{asset('img/sixmab.png')}}" style="width: 1.5em; float: left;"/>
        <span class="ml-2">{{ __('adminlte::adminlte.steps') }}</span>
    </div>
    <div class="w-100 alto1 alto2">
        <a href="{{route('maquinarias.baterias.index', ['maquinaria' => $maquinaria->id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
@stop

<style>
    #pricing-table .plan {
        width: 361px !important;
        height: 325px;
        text-align: justify !important;
        border-radius: 0 !important;
    } 

    @media (max-width: 1280px) {
        #pricing-table .plan {
            width: 320px !important;
        }
    }

    @media (max-width: 1277px) {
        #pricing-table .plan {
            width: 324px !important;
        }
    }

    @media (max-width: 1160px) {
        #pricing-table .plan {
            width: 285px !important;
        }
    }

    @media (max-width: 1049px) {
        #pricing-table .plan {
            width: 250px !important;
        }
    }

    @media (max-width: 480px) {
        #pricing-table .plan {
            width: 304px !important;
        }
    }    
    
    @media (max-width: 372px) {
        #pricing-table .plan {
            width: 268px !important;
        }
    }

    @media (max-width: 320px) {
        #pricing-table .plan {
            width: 230px !important;
        }
    }
</style>

@section('contenido')
    <div class="row ssa1" id="dist">
        @if(count($pasosixmab)>0)
            @foreach ($pasosixmab as $item)
                <div class="box-body bodyPS">
                    <div id="pricing-table">                      
                        <h5 style="text-align: left !important; padding: 10px 0 0 36px; font-weight: bold;">{{ $item->tipo_paso_sixmab->id }} - {{ $item->tipo_paso_sixmab->nombre }}</h5>
                        <div class="plan" style="z-index: 1;">
                            <a href="{{route('redirect', ['pasosixmab'=> $item->tipo_paso_sixmab_id , 'idb'=>$bateria->id])}}">                                                        
                                <span> 
                                    <img class="psimg" src="{{ asset('img/pasosixmab/'.$item->tipo_paso_sixmab->foto) }}" alt="">                                                            
                                </span>
                                <span style="top: 10px; position: relative;">{{ $item->tipo_paso_sixmab->descripcion }}</span>          
                            </a>
                        </div>
                    </div>     
                </div>           
            @endforeach
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
                    <font style="vertical-align: inherit;">No se encuentran registros, por favor verificar nuevamente.</font>
                </font>
            </div>
        @endif
    </div>
@stop