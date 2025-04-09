@extends('layouts.layouts')

@section("scripts")
    <script src="{{asset("assets/js/foto.js")}}" type="text/javascript"></script>
    <link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection

@section('titulo')
    <div class="ico-sixmab1">
        <img alt="" class="t-ico" src="{{asset('img/sixmab-n.png')}}" style="width: 2em;"/>
        <span class="ml-2">{{ __('adminlte::adminlte.SIXMAB-Step-Types') }}</span>
    </div>
    <div class="w-100" style="position: relative; bottom: 50px;">        
        <div class="box-header with-border">            
            <a href="{{route('tipos_pasosixmab.index')}}" class="btn btn-secondary btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fas fa-fw fa-reply-all mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.return') }}</span></a>
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
                <form action="{{route('tipos_pasosixmab.store')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('includes.form-error')
                        @include('includes.mensaje')
                        @include('tablasistema.tipo-pasosixmab.form')
                    </div>
                    <div class="card-footer text-muted">
                        @include('includes.boton-form-crear')
                    </div>
                </form>
                <a href="{{asset('img/pasosixmab/formato.png')}}" style="text-align:right;" download="Formato de Imagen.png">Descargar Formato de Imagen</a>
            </div>
        </div>
    </div>
@stop