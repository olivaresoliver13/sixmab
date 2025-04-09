@extends('layouts.layouts')

@section('titulo')
    <div class="ico-sixmab1 pl2 pl1">
        <i class="fas fa-bell"></i>   
        <span class="ml-2">Detalle de Alarma</span>
    </div>
    <div class="w-100 pl2">
        <div class="box-tools pull-right" style="margin-right: 4px;">
            <form method="POST" action="{{route('alarma.pdf', ['alarma_id' => $alarma_id])}}" target="_blank">
                @csrf
                <button class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver"><i class="fa fa-fw fa-plus-circle"></i> Generar PDF</button>
            </form>
        </div>

        <a href="{{route('alarmas.index')}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
@stop

@section('contenido')
    @include('alarma.detalle_cuerpo')
@endsection