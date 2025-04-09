@extends('includes.modal-content')

@section('titulo')
  <i class="fa fa-user"></i><span class="ml-2">{{ __('adminlte::adminlte.user') }}</span>
@endsection

@section('cuerpo')
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.name') }}:</strong> {{$usuario->name}}</li>
    <br>
    <center>
      @if ($usuario->foto === Null)    
        <img src="{{asset('img/usuario/user.png')}}" style="position: relative; width: 152px;" alt=""/>   
      @else
        <img src="{{asset('img/usuario/'.$usuario->foto)}}" style="position: relative; width: 152px;" alt=""/>              
      @endif  
    </center>
    <br>
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.email') }}:</strong> {{$usuario->email}}</li>
    @if($usuario->status == true)                   
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.active') }}</li>
    @else
      <li class="list-group-item"><strong>{{ __('adminlte::adminlte.state') }}</strong> {{ __('adminlte::adminlte.inactive') }}</li>
    @endif  
    @if($usuario->privilege == true)                   
      <li class="list-group-item"><strong>Privilegio</strong> {{ __('adminlte::adminlte.active') }}</li>
    @else
      <li class="list-group-item"><strong>Privilegio</strong> {{ __('adminlte::adminlte.inactive') }}</li>
    @endif  
    <li class="list-group-item"><strong>{{ __('adminlte::adminlte.created_at') }}:</strong> {{ \Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y H:i:s')}}</li>
  </ul>
@endsection