@extends('layouts.layouts')

@section("scripts")
    <script src="{{asset("assets/pages/scripts/seguridad/mostrar-icono.js")}}" type="text/javascript"></script>
@endsection

<!-- popup -->
<link rel="stylesheet" href="{{asset("css/popup.css")}}">
<!-- fin popup -->

@section('titulo')
    <div class="ico-sixmab1">
        <img alt="" class="t-ico" src="{{asset('img/ts.png')}}" style="width: 2em;"/>
        <span class="ml-2">{{ __('adminlte::adminlte.type-machinery') }}</span>
    </div>
    <div class="w-100" style="position: relative; bottom: 60px;">        
        <div class="box-header with-border">            
            <a href="{{route('tipos_maquinarias.index')}}" class="btn btn-secondary btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fas fa-fw fa-reply-all mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.return') }}</span></a>
        </div>                                                                                                                                           
    </div> 
@stop

@section('contenido')
    <br>
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h3 class="text-left"><i class="fa fa-plus fa-1x"></i><span class="ml-2">{{ __('adminlte::adminlte.update') }}</span></h3>    
                </div>
                <form action="{{route('tipos_maquinarias.update', ['tipo_maquinaria' => $data->id])}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @method('put')    
                    @csrf   
                    <div class="card-body">
                        @include('includes.form-error')
                        @include('includes.mensaje')
                        @include('tablasistema.tipo-maquinaria.form')
                    </div>
                    <div class="card-footer text-muted">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
                <a id="ico-bat" href="#popup" style="text-align:right;"><i class="fas fa-eye"> Ver Iconos</i></a>
            </div>
        </div>
    </div>
    <div id="popup" class="overlay">
        <div id="popupBody">
            <a id="cerrar" href="#">&times;</a>
            @include('includes.icono')
        </div>
    </div>
@stop