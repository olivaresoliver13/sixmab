@extends('layouts.layouts')

@section('titulo')
    <div class="w-100 alto">
        <div class="box-header with-border">
            <a href="{{route('maquinaria-pdfgeneral.index')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white" style="width: 130px;"><i class="fas fa-file">&nbsp;</i>{{ __('adminlte::adminlte.all-records') }}</a> 
        </div>
    </div>
    <i class="fas fa-file"></i>
        @if(count($maquinarias) === 1)
            <span class="ml-2">{{ __('adminlte::adminlte.system') }}</span>
        @else
            <span class="ml-2">{{ __('adminlte::adminlte.systems') }}</span>
        @endif
@stop

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/tabla.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<br>
    <div class="box-body">
        <table class="table table-bordered" data-order='[[ 0, "asc" ]]' data-page-length='10' style="border: 1px solid #dee2e6;" id="pricing-table">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Nombre</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Siglas</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Reportes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($maquinarias as $item)
                    <tr>
                        <td class="text-left">{{$item->codigo}}</td>
                        <td class="text-left">{{$item->siglas}}</td>
                        <td class="text-center" style="border-left: 1px solid #dee2e6; width: 130px !important;">                          
                            <a href="{{route('maquinaria-pdfindividual.index', ['maquinaria' => $item->id])}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                <i class="fas fa-file"></i> 
                            </a>                      
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<br>
@stop