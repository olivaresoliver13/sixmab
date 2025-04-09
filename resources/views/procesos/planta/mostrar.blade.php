@extends('includes.modal-content')

@section('titulo')
  <i class="fas fa-city"></i><span class="ml-2">{{ __('adminlte::adminlte.plant') }}</span>
@endsection

@section('cuerpo')
<ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$planta->nombre}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.acronym') }}:</strong> {{$planta->siglas}}</li>  
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.country') }}:</strong> {{$planta->pais->nombre}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.identifier') }}:</strong> {{$planta->identificador}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.phone') }}:</strong> {{$planta->telefono1}}</li>
    @isset($planta->telefono2)
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.phone-2') }}:</strong> {{$planta->telefono2}}</li>
    @endisset
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.email') }}:</strong> {{$planta->email}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.address') }}:</strong> {{$planta->direccion}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{$planta->estado()}}</li>    
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($planta->created_at)->format('d/m/Y H:i:s')}}</li>   
</ul>
@endsection