@extends('includes.modal-content')

@section('titulo')
  <i class="fas fa-atom"></i>
  <span class="ml-2">{{ __('adminlte::adminlte.chemical-composition') }}</span>
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$composicion_quimica->nombre}}</li>     
    @if($composicion_quimica->estado == true)                   
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.active') }}</li>
    @else
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.inactive') }}</li>
    @endif    
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($composicion_quimica->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
@endsection