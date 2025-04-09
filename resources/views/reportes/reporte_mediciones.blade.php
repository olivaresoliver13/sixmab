@extends('layouts.layouts')

@section('titulo')
  <div class="ico-sixmab1">
    <i class="fas fa-file"></i>
    <span class="ml-2">Reporte de Medición Online</span>
    <div class="w-100 alto1 alto2 mlinea-01">
      <a href="{{route('reportes.seleccionar', ['empresa' => $empresa->id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
  </div>
@stop

@section('contenido')
  <br>
  <h3>Empresa: {{$empresa->nombre}}</h3>
  <br>
  <p>{!!$mensaje!!}</p>

  @include('reportes.grafico_mediciones')
@endsection