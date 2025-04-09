@extends('layouts.layouts')

@section('titulo')
    <div class="w-100 alto">
        <div class="box-header with-border">
            <a href="{{route('permisos.index')}}" class="btn btn-secondary btn-sm pull-right rounded-pill text-white" style="width: 130px;"><i class="fa fa-fw fa-reply-all"></i>{{ __('adminlte::adminlte.return') }}</a> 
        </div>
    </div>
    <div class="w-100 alto1">
        <i class="fa fa-unlock-alt"></i>&ensp;{{ __('adminlte::adminlte.permission') }}</span>
    </div> 
@stop

@section('contenido')
    <div class="row">
        <div class="col-lg-8 offset-md-2">
            <div class="card text-center shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header">
                    <h3 class="text-left"><i class="fa fa-plus fa-1x"></i><span class="ml-2">{{ __('adminlte::adminlte.update') }}</span></h3>    
                </div>
                <form action="{{route('permisos.update', $data->id)}}" id="form-general" class="form-horizontal" method="POST" autocomplete="off">
                    @csrf @method("put")
                    <div class="card-body">
                        @include('includes.form-error')
                        @include('includes.mensaje')
                        @include('seguridad.permiso.form')
                    </div>
                    <div class="card-footer text-muted">
                        @include('includes.boton-form-editar')
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop