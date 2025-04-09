@extends('layouts.layouts')

@section('titulo')
    <div class="box-header with-border">
        <a href="{{route('maquinarias.baterias.index', ['maquinaria' => $bateria->maquinaria_id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1"></i> {{ __('adminlte::adminlte.return') }}</a>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $bateria->maquinaria->planta->empresa_id])}}">{{$bateria->maquinaria->planta->empresa->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('plantas.maquinarias.index', ['planta' => $bateria->maquinaria->planta_id])}}">{{$bateria->maquinaria->planta->siglas}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('maquinarias.baterias.index', ['maquinaria' => $bateria->maquinaria_id])}}">{{$bateria->maquinaria->siglas}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$bateria->siglas}}</li>
            <li class="breadcrumb-item">24 Celdas</li>
        </ol>
    </nav>
@stop

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection

@section('contenido')
    @include('includes.mensaje')
    <div class="container w-75 mx-auto">       
        <form id="form_celdas" method="post" action="{{route('baterias.celdas.store', ['bateria' => $bateria->id])}}">
            <div class="form-group row">
                <label for="tipo_maquinaria" class="col-sm-4 col-form-label">Seleccione dispositivo maestro:</label>
                <div class="col-sm-4">
                    <select class="selectpicker form-control" data-live-search="true" title="Seleccione dipositivo maestro" name="dispositivo_maestro" id="disp_maestro">
                        @foreach ($maestros as $disp)
                            @if(count($celdas) > 0)
                                <option value="{{$disp->id}}" {{$maestro->id == $disp->id ? 'selected' : ''}}>{{$disp->identificador}}</option>
                            @else
                                <option value="{{$disp->id}}">{{$disp->identificador}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <input class="btn btn-block btn-success pull-right text-white" type="submit" value="Guardar">
                </div>
            </div>
            <br>
            @csrf
            @if ($tipo_configuracion)
                <div class="row">
                    @for ($row = 1; $row <= $configuracion_celdas['filas']; $row++)
                        @if ($row % 2 == 0)
                            @php
                                $imprimir = $row * $configuracion_celdas['columnas'];
                                $diff = -1;
                            @endphp
                        @else
                            @php
                                $imprimir = (($row - 1)* $configuracion_celdas['columnas']) + 1;
                                $diff = 1;
                            @endphp
                        @endif
                        @for ($col = 1; $col <= $configuracion_celdas['columnas']; $col++)
                            <div class="float-right col-3 btn btn-outline-secondary" style="min-height: 70px;">
                                <p class="float-left" style="font-size: 15px;">{{$imprimir}}</p>
                                <p class="float-right" id="tipo_celda_{{$imprimir}}" style="font-size: 15px;">{{count($celdas) > 0 ? $celdas->where('numero_celda', $imprimir)->first()->dispositivo->tipo() : ''}}</p>
                                <select class="selectpicker form-control select_dispositivos" data-live-search="true" title="Seleccione dispositivo" name="celda_{{$imprimir}}" id="celda_{{$imprimir}}" required>
                                    <optgroup class="maestro_option float-left" label="Maestro">
                                        @if ($maestro != null)
                                            <option value="{{$maestro->id}}" {{$celdas->where('numero_celda', $imprimir)->first()->dispositivo_id == $maestro->id ? 'selected' : '' }}>{{$maestro->identificador}}</option>
                                        @endif
                                    </optgroup>
                                    <optgroup class="esclavos_select float-left" label="Esclavos">
                                        @if (count($celdas) > 0)
                                            @foreach ($maestro->esclavos as $disp)
                                                <option value="{{$disp->id}}" {{$celdas->where('numero_celda', $imprimir)->first()->dispositivo_id == $disp->id ? 'selected' : ''}}>{{$disp->identificador}}</option>
                                            @endforeach
                                        @endif
                                    </optgroup>
                                </select>
                            </div>
                            @php
                                $imprimir += $diff;
                            @endphp
                        @endfor
                    @endfor
                </div>
                @else
                <div class="row">
                    <table class="table text-center" id="">
                        <thead class="thead-dark">
                            <tr align="center">
                                <th scope="col">{{ __('adminlte::adminlte.no-cells') }}</th>
                                <th scope="col">{{ __('adminlte::adminlte.device') }}</th>
                                <th scope="col">{{ __('adminlte::adminlte.device-type') }}</th>
                            </tr>
                        </thead>
                        <tbody>    
                            @for ($i = 1; $i <= 24; $i++)
                            <tr id="celda_{{$i}}">
                                <td>{{$i}}</td>
                                <td>
                                    <select class="selectpicker form-control select_dispositivos" data-live-search="true" title="Seleccione dispositivo" name="celda_{{$i}}" required>
                                        <optgroup class="maestro_option float-left" label="Maestro"></optgroup>
                                        <optgroup class="esclavos_select float-left" label="Esclavos"></optgroup>
                                    </select>
                                </td>
                                <td>Tipo</td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            @endif
        </form>
    </div>
    <br>    
@stop

@section('scripts')
    <script>
        $(document).ready(function(){
            $.fn.selectpicker.Constructor.BootstrapVersion = '4';
            
            $('#disp_maestro').change(function(){
                maestro_id = $(this).val();

                $.get('/celdas/dispositivos/'+maestro_id, function(data){
                    console.log(data);

                    var options = [];

                    $('.maestro_option').html($('<option>', {
                        value: data.maestro.id,
                        text: data.maestro.identificador
                    }));


                    $.each(data.esclavos, function() {
                        options.push('<option value="' + this.id + '">' + this.identificador + '</option>');
                    });

                    $('.esclavos_select').html(options.join(''));
                    
                    $('.selectpicker').selectpicker('refresh');

                    $('.selectpicker').selectpicker('render');
                });
            });

            $('.select_dispositivos').on('change', function(){
                var tipo = $(this).attr('id');

                var selected = $(':selected', this);
                var label = selected.closest('optgroup').attr('label');
                
                label = label == 'Esclavos' ? 'Esclavo' : 'Maestro';
                $('#tipo_'+tipo).text(label);
            });
        });  
    </script>    
@endsection