@extends('includes.modal-content')

@section('titulo')
  <i class="fas fa-user-tag"></i>&ensp;{{ __('adminlte::adminlte.role') }}
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$rol->name}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.slug') }}:</strong> {{$rol->slug}}</li>
    @if($rol->special == "")
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.Access Type') }}:</strong> Varios permisos</li>
    @else
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.Access Type') }}:</strong> {{$rol->special}}</li>
    @endif
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.description') }}:</strong> {{$rol->description}}</li>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($rol->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
@endsection