@extends('includes.modal-content')

@section('titulo')
  <i class="fa fa-unlock-alt"></i>&ensp;{{ __('adminlte::adminlte.permission') }}
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$permiso->name}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.slug') }}:</strong> {{$permiso->slug}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.description') }}:</strong> {{$permiso->description}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($permiso->created_at)->format('d/m/Y H:i:s')}}</li> 
  </ul>
@endsection