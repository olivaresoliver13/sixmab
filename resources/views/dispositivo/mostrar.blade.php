@extends('includes.modal-content')

@section('titulo')
  <i class="fa fa-rss"></i>
  <span class="ml-2">{{ __('adminlte::adminlte.device') }}</span>
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.code') }}:</strong> {{$dispositivo->identificador}}</li>
    <li class="list-group-item"><strong>Tipo de Dispositivo:</strong> {{$dispositivo->tipo()}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{$dispositivo->estado()}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($dispositivo->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
  <br>
  @if($dispositivo->tipo_dispositivo == 1)
    <strong>Corriente Máxima:</strong> {{$detalle->corriente_max}}<br>
    <strong>Corriente Mínima:</strong> {{$detalle->corriente_min}}<br>
    <strong>Voltaje Máxima:</strong> {{$detalle->voltaje_max}}<br>
    <strong>Voltaje Mínima:</strong> {{$detalle->voltaje_min}}<br>
    <strong>Temperatura Máxima:</strong> {{$detalle->temperatura_max}}<br>
    <strong>Temperatura Mínima:</strong> {{$detalle->temperatura_min}}
    <hr>
    <span>
      <strong>Dispositivo Esclavo<strong>
    </span>
    <br><br>

    @if(count($dispositivo->esclavos)>0)
      @foreach ($dispositivo->esclavos as $esclavo)
        <li style="font-weight: normal;">{{$esclavo->identificador}}</li>
      @endforeach  
    @else
      <p style="font-weight: normal;">No hay dispositivos seleccionados</p>
    @endif 
  @endif
@endsection