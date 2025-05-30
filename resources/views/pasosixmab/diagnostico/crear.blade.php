@extends('layouts.layouts')

@section('titulo')
    <div class="ico-sixmab1">
        <img alt="" class="t-ico" src="{{asset('img/sixmab.png')}}" style="width: 2em;"/>
        <span class="ml-2">Diagnóstico</span>
    </div>
    <div class="w-100" style="position: relative; bottom: 50px;">        
        <div class="box-header with-border">            
            <a href="{{route('baterias.diagnostico.index', ['bateria' => $bateria->id])}}" class="btn btn-secondary btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fas fa-fw fa-reply-all mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.return') }}</span></a>
        </div>                                                                                                                                           
    </div> 
@stop

@section('contenido')
    <div class="row" id="dist">
        <div class="col-lg-8 offset-md-2">
            <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h3 class="text-left"><i class="fa fa-plus fa-1x"></i><span class="ml-2">{{ __('adminlte::adminlte.create') }}</span></h3>    
                </div>
                <form action="{{route('baterias.diagnostico.store', ['bateria' => $bateria->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf
                    <div class="card-body">
                        @include('includes.form-error')
                        @include('includes.mensaje')
                        @include('pasosixmab.diagnostico.form')
                    </div>
                    <div class="card-footer text-muted">
                        @include('includes.boton-form-crear')
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop