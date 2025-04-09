@extends('includes.modal-content')

@section('titulo')
  <i class="fas fa-car-battery"></i>
  <span class="ml-2">{{ __('adminlte::adminlte.type-battery') }}</span>
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$tipo_bateria->nombre}}</li>     
    @if($tipo_bateria->estado == true)                   
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.active') }}</li>
    @else
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.inactive') }}</li>
    @endif    
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($tipo_bateria->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
@endsection