@extends('layouts.layouts')

@section('titulo')
    <div class="ico-sixmab1">
        <i class="fas fa-clipboard"></i>
        <span class="ml-2">Reporte</span>
        <br><br>
        <p>Seleccione una Empresa</p>
    </div>
@stop

@section('contenido')

    <script>
        // Genera una medicion cada 15 segundos
        setInterval(function () {
            $.get('{{route('generar_medicion')}}', function(res)
            {
                {{--  console.log(res);  --}}
            })
        }, 15000);
    </script>
    <div class="row ssa1" id="dist">
        <div class="box-body">
            <div id="pricing-table">
                <tbody>
                    @foreach ($empresas as $item)
                        <tr>
                            <div class="plan"> 
                                @if($item->estado == true)                   
                                    <h3 class="text-dark">{{ $item->siglas }}
                                @else
                                    <h3 class="text-dark" style="color: #dc3545 !important;">{{ $item->siglas }}
                                @endif                             
                                    <span>
                                        <a href="{{ route('reportes.seleccionar', ['empresa' => $item->id]) }}">                 
                                            <i class="fas fa-building mt-3 color-ico tooltipsC" style="font-size: 2.6em; color:#777;" title="{{ $item->nombre }}"></i>                                 
                                        </a>
                                    </span>
                                </h3>  
                                <br>
                            </div> 
                        </tr>
                    @endforeach
                </tbody>
            </div>
        </div>
    </div>
@endsection