@extends('layouts.layouts')

@section('titulo')
    <div class="w-100 alto">
        <div class="box-header with-border">
            <a href="#" class="btn btn-success btn-sm pull-right rounded-pill" style="width: 130px;"><i class="fas fa-file">&nbsp;</i>{{ __('adminlte::adminlte.all-records') }}</a> 
        </div>
    </div>
    <i class="fas fa-file"></i>
        @if(count($mediciones) === 1)
            <span class="ml-2">{{ __('adminlte::adminlte.online-monitoring') }}</span>
        @else
            <span class="ml-2">{{ __('adminlte::adminlte.online-monitoring') }}</span>
        @endif
@stop

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/tabla.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <br>
        <div class="box-body">
            <table class="table table-bordered" data-order='[[ 0, "desc" ]]' data-page-length='50' style="border: 1px solid #dee2e6;" id="pricing-table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col" style="border-left: 1px solid #8e8e8e; width: 129px !important;">Fecha</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Cte(A)</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Temp(°C) 1</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Temp(°C) 2</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Temp(°C) 3 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Temp(°C) 4 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Temp(°C) 5 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Volt(V) 1 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Volt(V) 2 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Volt(V) 3 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Volt(V) 4 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Volt(V) 5 </th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mediciones as $item)  
                        <tr>
                            <td class="text-left">{{$item->created_at}}</td>
                            <td class="text-left">{{$item->corriente}}</td>
                            <td class="text-left">{{$item->temperatura0}}</td>
                            <td class="text-left">{{$item->temperatura1}}</td>
                            <td class="text-left">{{$item->temperatura2}}</td>
                            <td class="text-left">{{$item->temperatura3}}</td>
                            <td class="text-left">{{$item->temperatura4}}</td>
                            <td class="text-left">{{$item->voltaje0}}</td>
                            <td class="text-left">{{$item->voltaje1}}</td>
                            <td class="text-left">{{$item->voltaje2}}</td>
                            <td class="text-left">{{$item->voltaje3}}</td>
                            <td class="text-left">{{$item->voltaje4}}</td>
                             <td class="text-center" style="border-left: 1px solid #dee2e6; width: 130px !important;">                          
                                <a href="#" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
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
