@extends('includes.modal-content')

@section('titulo')
  <i class="fas fa-car-battery"></i><span class="ml-2">{{ __('adminlte::adminlte.battery') }}</span>
@endsection

@section('cuerpo')
<ul class="list-group list-group-flush">
<li class="card-text"top: 9px; position: relative;"><strong>{{ __('adminlte::adminlte.steps') }}</strong></li><br><hr>
<li class="card-text">{{ __('adminlte::adminlte.lifting') }}</li><br>
<li class="card-text">{{ __('adminlte::adminlte.diagnosis') }}</li><br>
<li class="card-text">{{ __('adminlte::adminlte.maintenance') }}</li><br>
<li class="card-text">{{ __('adminlte::adminlte.regeneration') }}</li><br>
<li class="card-text">{{ __('adminlte::adminlte.online-monitoring') }}</li><br>
<li class="card-text">{{ __('adminlte::adminlte.final-disposition') }}</li>
</ul>
@endsection

