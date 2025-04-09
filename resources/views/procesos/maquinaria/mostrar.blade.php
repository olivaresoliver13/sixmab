@extends('includes.modal-content')

@section('titulo')
  <img alt="" src="{{asset('img/ts-n.png')}}" style="width: 2em;"/><span class="ml-2">{{ __('adminlte::adminlte.system') }}</span>
@endsection

@section('cuerpo')
<ul class="list-group list-group-flush">
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.code') }}:</strong> {{$maquinaria->codigo}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.acronym') }}:</strong> {{$maquinaria->siglas}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.type-system') }}:</strong> {{$maquinaria->tipo_maquinaria->nombre}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{$maquinaria->estado()}}</li>
  <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($maquinaria->created_at)->format('d/m/Y H:i:s')}}</li>
</ul>
@endsection