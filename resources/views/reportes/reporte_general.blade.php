@extends('layouts.layouts')

@section('titulo')
    <div class="ico-sixmab1">
        <i class="fas fa-file"></i>
        <span class="ml-2">Reporte General</span>    

    </div>
@stop

@section('contenido')
    <div class="w-100 alto1 alto2 mlinea-01">
        <a href="{{route('reportes.seleccionar', ['empresa' => $empresa->id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
    <div class="box-tools pull-right" style="margin-right: 4px;">
        <form method="POST" action="{{route('reportes.generar-pdf', ['empresa' => $empresa->id, 'tipo_reporte' => $tipo_reporte] )}}" target="_blank">
            @csrf
            <button class="btn btn-block btn-success btn-sm rounded-pill"><i class="fa fa-fw fa-plus-circle"></i> Generar PDF</button>
        </form>
    </div>
    <br>
    <h3>Empresa: {{$empresa->nombre}}</h3>
    <br>
    @include('reportes.tabla_general')
@endsection