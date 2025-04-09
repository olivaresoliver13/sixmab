@extends('includes.modal-content')

@section('titulo')
  <i class="fas fa-car-battery"></i><span class="ml-2">{{ __('adminlte::adminlte.battery') }}</span>
@endsection

@section('cuerpo')
<ul class="list-group list-group-flush">
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.battery-number') }}:</strong> {{$bateria->numero_bateria}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.acronym') }}:</strong> {{$bateria->siglas}}</li>
  <li class="list-group-item">    
    @if ($bateria->tipo_bateria_id == 1)
      <strong>Batería de {{$bateria->tipo_bateria->nombre}}:</strong> {{$bateria->cca_o_impedancia}} CCA
    @elseif($bateria->tipo_bateria_id == 2)
      Batería de {{$bateria->tipo_bateria->nombre}}
    @elseif($bateria->tipo_bateria_id == 3)
      <strong>Batería de {{$bateria->tipo_bateria->nombre}}:</strong> {{$bateria->cca_o_impedancia}} Impedancia
    @else
      <strong>Batería de {{$bateria->tipo_bateria->nombre}}:</strong> {{$bateria->cca_o_impedancia}}
    @endif 
  </li>
  <li class="list-group-item">
    <strong>
      {{ __('adminlte::adminlte.chemical-composition') }}:
    </strong> {{$bateria->composicion_quimica->nombre}}
  </li>  
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.brand') }}:</strong> {{$bateria->marca->nombre}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.model') }}:</strong> {{$bateria->modelo->nombre}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.serial-number') }}:</strong> {{$bateria->numero_serie}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.nominal-voltage') }}:</strong> {{$bateria->voltaje_nominal}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.rated-capacity') }}:</strong> {{$bateria->capacidad_nominal}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.nominal-download') }}:</strong> {{$bateria->descarga_nominal}}</li>
  <li class="list-group-item"><strong>Cantidad de Celdas a Medir:</strong> {{$bateria->cantidad_celda}}</li>
  <li class="list-group-item"><strong>Cantidad de Temperaturas a Medir:</strong> {{$bateria->cantidad_temperatura}}</li>
  @if( !empty($bateria->dispositivo_id))
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.device') }}:</strong> {{$bateria->dispositivo->identificador}}</li>
  @else
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.device') }}:</strong> No tiene dispositivo asignado</li>
  @endif
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{$bateria->estado()}}</li> 
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($bateria->created_at)->format('d/m/Y H:i:s')}}</li>
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
    <p style="font-weight: normal;">No hay Pasos SIXMAB seleccionados</p>
  @endif  
@endsection