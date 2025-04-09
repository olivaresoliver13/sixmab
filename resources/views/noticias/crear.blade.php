@extends('layouts.layouts')

@section('titulo')
    <div class="w-100 alto2">
        <div class="box-header with-border">
            <a href="{{route('noticias.index')}}" class="btn btn-secondary btn-sm pull-right rounded-pill text-white" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1"></i>{{ __('adminlte::adminlte.return') }}</a> 
        </div>
    </div>
    <div class="w-100 alto1">
        <i class="far fa-newspaper"></i><span class="ml-2">{{ __('adminlte::adminlte.new') }}</span>
    </div> 
@stop

@section("scripts")
    <script src="{{asset("assets/js/foto.js")}}" type="text/javascript"></script>
    <link href="{{asset("assets/js/bootstrap-fileinput/css/fileinput.min.css")}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset("assets/js/bootstrap-fileinput/js/fileinput.min.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput/js/locales/es.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/js/bootstrap-fileinput/themes/fas/theme.min.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <br>
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h3 class="text-left"><i class="fa fa-plus fa-1x"></i><span class="ml-2">{{ __('adminlte::adminlte.create') }}</span></h3>     
                </div>
                <form action="{{route('noticias.store')}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include('includes.form-error')
                        @include('includes.mensaje')
                        @include('noticias.form')
                    </div>
                    <div class="card-footer text-muted">
                        @include('includes.boton-form-crear')
                    </div>
                </form>
                <a href="{{asset('img/noticia/formato.png')}}" style="text-align:right;" download="Formato de Imagen.png">Descargar Formato de Imagen</a>
            </div>
        </div>
    </div>
@stop