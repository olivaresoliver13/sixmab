@extends('layouts.layouts')

@section('titulo')
    <div class="ico-sixmab1">
        <i class="fas fa-car-battery t-ico"></i>
        <span class="ml-2">{{ __('adminlte::adminlte.type-battery') }}</span>
    </div>
    <div class="w-100" style="position: relative; bottom: 34px;">        
        <div class="box-header with-border">            
            <a href="{{route('tipos_baterias.index')}}" class="btn btn-secondary btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fas fa-fw fa-reply-all mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.return') }}</span></a>
        </div>                                                                                                                                           
    </div> 
@stop

@section('contenido')
    <br>
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h3 class="text-left"><i class="fa fa-plus fa-1x"></i><span class="ml-2">{{ __('adminlte::adminlte.create') }}</span></h3>    
                </div>
                <form action="{{route('tipos_baterias.store')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('includes.form-error')
                        @include('includes.mensaje')
                        @include('tablasistema.tipo-bateria.form')
                    </div>
                    <div class="card-footer text-muted">
                        @include('includes.boton-form-crear')
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop