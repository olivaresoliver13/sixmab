@extends('includes.modal-content')

@section('titulo')
  <img alt="" class="header-ico" src="{{asset('img/ts.png')}}" style="width: 1.5em; float: left;"/>
  <span class="ml-2">{{ __('adminlte::adminlte.type-machinery') }}</span>
  @endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$tipo_maquinaria->nombre}}</li>  
    @if (strpos($tipo_maquinaria->icono, "img") === false)
      <i class="{{ $tipo_maquinaria->icono }} mt-4 text-center" style="font-size: 8em; color:#777; top: -8px; position: relative;"></i>
    @else
    <div class="text-center">
      <img alt="" style="width: 10em; top: 3px; position:relative; padding:0;" src="{{asset($tipo_maquinaria->icono)}}"/>
    </div>
    @endif   
    @if($tipo_maquinaria->estado == true)                   
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.active') }}</li>
    @else
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.inactive') }}</li>
    @endif    
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($tipo_maquinaria->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
@endsection