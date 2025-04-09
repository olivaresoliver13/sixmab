@extends('includes.modal-content')

@section('titulo')
  <img alt="" class="header-ico" src="{{asset('img/sixmab-n.png')}}" style="width: 1.5em; float: left; top:4px;"/>
  <span class="ml-2">{{ __('adminlte::adminlte.SIXMAB-Step-Types') }}</span>
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$tipo_pasosixmab->nombre}}</li>  
    <div class="text-center">
      @if ($tipo_pasosixmab->foto != "")
        <img alt="" style="width: 20.5em; top: 12px; position:relative; padding:0;" src="img/pasosixmab/{{$tipo_pasosixmab->foto}}"/>      
      @else
        <img alt="" style="width: 20.5em; top: 12px; position:relative; padding:0;" src="img/pasosixmab/estandar.png"/>
      @endif  
    </div>
    <br>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.order') }}:</strong> {{$tipo_pasosixmab->orden}}</li>  
    <li class="list-group-item text-justify"><strong>{{ __('adminlte::adminlte.description') }}:</strong> {{$tipo_pasosixmab->descripcion}}</li>  
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$tipo_pasosixmab->nombre}}</li>   
    @if($tipo_pasosixmab->estado == true)                   
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.active') }}</li>
    @else
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.inactive') }}</li>
    @endif    
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($tipo_pasosixmab->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
@endsection