@extends('layouts.layouts')

@section('titulo')
    <div class="ico-sixmab1">
        <img alt="" class="t-ico" src="{{asset('img/ts-n.png')}}" style="width: 2em;"/>
        <span class="ml-2">{{ __('adminlte::adminlte.system') }}</span>
    </div>
    <div class="w-100" style="position: relative; bottom: 60px;">        
        <div class="box-header with-border bt05">            
            <a href="{{route('plantas.maquinarias.index', ['planta' => $data->planta_id])}}" class="btn btn-secondary btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fas fa-fw fa-reply-all mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.return') }}</span></a>
        </div>                                                                                                                                           
    </div> 
@stop

@section('contenido')
    <div class="row" id="dist">
        <div class="col-lg-8 offset-md-2">
            <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h3 class="text-left"><i class="fa fa-plus fa-1x"></i><span class="ml-2">{{ __('adminlte::adminlte.update') }}</span></h3>    
                </div>
                <form action="{{route('maquinarias.update', ['maquinaria' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        @include('includes.form-error')
                        @include('includes.mensaje')
                        @include('procesos.maquinaria.form')
                    </div>
                    <div class="card-footer text-muted">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop