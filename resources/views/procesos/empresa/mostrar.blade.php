@extends('includes.modal-content')

@section('titulo')
  <i class="fas fa-building"></i><span class="ml-2">{{ __('adminlte::adminlte.busines') }}</span>
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$empresa->nombre}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.acronym') }}:</strong> {{$empresa->siglas}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.country') }}:</strong> {{$empresa->pais->nombre}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.identifier') }}:</strong> {{$empresa->identificador}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.phone') }}:</strong> {{$empresa->telefono1}}</li>
    @isset($empresa->telefono2)
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.phone-2') }}:</strong> {{$empresa->telefono2}}</li>
    @endisset
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.email') }}:</strong> {{$empresa->email}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.address') }}:</strong> {{$empresa->direccion}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{$empresa->estado()}}</li> 
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($empresa->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
  <br>
  <span>
    <img alt="" class="header-ico" src="{{asset('img/sixmab.png')}}" style="width: 2.5em; float: left; right: 8px; bottom: 3px;"/>
    <strong>{{ __('adminlte::adminlte.steps') }}<strong>
  </span>
  <br><br>
  @if(count($tipos_paso_sixmab)>0)
    @foreach ($tipos_paso_sixmab as $paso_sixmab)
      <li style="font-weight: normal;">{{$paso_sixmab->tipo_paso_sixmab->nombre}}</li>
    @endforeach  
  @else
    <p style="font-weight: normal;">No hay Pasos Sixmab seleccionados</p>
  @endif     
@endsection