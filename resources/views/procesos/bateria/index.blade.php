@extends('layouts.layouts')

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/eliminar.js")}}" type="text/javascript"></script>
@endsection

@section('titulo')
    <div class="col-sm-6 float-right po1" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right cab-ico">
            <spam class="mr-2">Empresa:</spam>    
            @isset($maquinaria)
                <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $maquinaria->planta->empresa->id])}}">{{$maquinaria->planta->empresa->siglas}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta->id])}}">{{$maquinaria->planta->siglas}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$maquinaria->siglas}}</li>
                @if(count($baterias) === 1)
                    <li class="breadcrumb-item">{{ __('adminlte::adminlte.battery') }}</li>
                @else
                    <li class="breadcrumb-item">{{ __('adminlte::adminlte.batteries') }}</li>
                @endif   
            @endisset

            @isset($planta)
                <li class="breadcrumb-item"><a href="{{route('empresas.plantas.index', ['empresa' => $planta->empresa->id])}}">{{$planta->empresa->siglas}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$planta->siglas}}</li>
                @if(count($baterias) === 1)
                    <li class="breadcrumb-item">{{ __('adminlte::adminlte.battery') }}</li>
                @else
                    <li class="breadcrumb-item">{{ __('adminlte::adminlte.batteries') }}</li>
                @endif                      
            @endisset
        </ol>
    </div>
    <div class="ico-sixmab1">
        <i class="fas fa-car-battery"></i>
        @if(count($baterias) === 1)
            <span class="ml-2">{{ __('adminlte::adminlte.battery') }}</span>
        @else
            <span class="ml-2">{{ __('adminlte::adminlte.batteries') }}</span>
        @endif
    </div>
    <div class="w-100 alto1 alto2">
        @isset($maquinaria)
            @can('baterias.create')
                <a href="{{route('maquinarias.baterias.create', ['maquinaria' => $maquinaria->id])}}" class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i>{{ __('adminlte::adminlte.create-record') }}</a>
            @endcan 
            <a href="{{route('plantas.maquinarias.index', ['planta' => $maquinaria->planta_id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>    
        @endisset
        @isset($planta)
            <a href="{{route('empresas.plantas.index', ['empresa' => $planta->empresa_id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
        @endisset     
    </div>
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="row ssa1" id="dist">
        @if(count($baterias)>0)
            <div class="box-body">
                <div id="pricing-table">
                    <tbody>
                        @foreach ($baterias as $item)
                            <tr>
                                <div class="plan"> 
                                    @if($item->estado == true)                   
                                        <h3 class="text-dark">{{ $item->siglas }}
                                    @else
                                        <h3 class="text-dark" style="color: #dc3545 !important;">{{ $item->siglas }}
                                    @endif                             
                                        <span>
                                            <a href="{{route('baterias.pasosixmab.index', ['bateria' => $item->id])}}">
                                                @if($item->estado == true)                   
                                                    <i class="fas fa-car-battery mt-3 color-ico tooltipsC" style="font-size: 2.6em; color:#777;" title="{{ $item->nombre }}"></i>
                                                @else
                                                    <i class="fas fa-car-battery mt-3 color-ico tooltipsC" style="font-size: 2.6em; color:#dc3545; z-index:1" title="{{ $item->nombre }}"></i>
                                                    <div style="font-size: 13px; top: 16px; position: relative; color: #dc3545; height: 0; top:150px;">Desactivada</div>
                                                @endif                                   
                                            </a>
                                        </span>
                                    </h3>  
                                    <div> 
                                        <td align="center" style="border-left: 1px solid #dee2e6; width: 140px !important;">   
                                            @can('baterias.show')
                                                <a onclick="ver('{{route('baterias.show', ['bateria' => $item->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                                    <i class="fas fa-eye"></i> 
                                                </a>
                                            @endcan
                                            @can('baterias.edit')  
                                                <a href="{{route('baterias.edit', ['bateria' => $item->id])}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                            @endcan
                                            @can('baterias.destroy')                            
                                                <form action="{{route('baterias.destroy', ['bateria' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                                                    @csrf @method("delete")
                                                    <button type="submit" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>                                       
                                            @endcan
                                            @can('baterias.inhabilitar') 
                                                @if($item->estado == true)                 
                                                    <a onclick="deactivate('{{route('baterias.deactivate', ['bateria' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                                        <i class="fas fa-power-off"></i> 
                                                    </a>  
                                                @else
                                                    <a onclick="activate('{{route('baterias.activate', ['bateria' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
                                                        <i class="fas fa-power-off"></i> 
                                                    </a>  
                                                @endif
                                            @endcan
                                            @can('Configurar.dispositivo')  
                                                <a href="{{route('baterias.celdas.index', ['bateria' => $item->id])}}" class="tooltipsC btn btn-sm btn-secondary" title="Configurar dispositivos">
                                                    <i class="fas fa-cog m"></i> 
                                                </a>
                                            @endcan
                                        </td>
                                    </div> 
                                    <div>
                                    <div class="card-body" style="padding: 0 0 0 2rem; text-align: left;">
                                        <spam class="card-text" style="font-size: 13px !important; top: 14px; position: relative;"><strong>{{ __('adminlte::adminlte.steps') }}</strong></spam><br><hr>
                                        @foreach ($tipos_paso_sixmab as $paso_sixmab)
                                            <li style="font-weight: normal;">{{$paso_sixmab->nombre}}</li>
                                        @endforeach  
                                    </div>
                                </div>    
                                </div>                            
                            </tr>     
                        @endforeach
                    </tbody>
                </div>
            </div>
        @else
            <div class="alert alert-info alert-dismissible" style="width:100%">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">×</font>
                    </font>
                </button>
                <h5>
                    <i class="icon fas fa-info"></i>
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">¡Mensaje de SIXMAB!</font>
                    </font>
                </h5>
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">No se encuentran registros, por favor verificar nuevamente.</font>
                </font>
            </div>
        @endif
    </div>
@stop

<script>
    function ver(url){
        $.get(url, function(resp){
            $('#modal-content').html(resp);
            $('#modal').modal('toggle');
        });
    }

    function deactivate(url, id){

        Swal.fire({
            title: 'Estás Seguro de Desactivar?',
            text: "Esta Batería!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: 'Si, Desactivar!'
        })
        .then( (result) => {
            if (result.value) {
            
                $.post(url, {'_method': 'patch', '_token': '{{ csrf_token() }}'}, function(resp){
                    if(resp){
                        $('.item-'+id).remove();
                        Swal.fire({
                            icon: 'success',
                            title: 'SIXMAB',
                            text: 'Batería Desactivada',
                            showConfirmButton: false
                        })
                        setTimeout(function () { location.reload(1); }, 2000);
                    }else{
                        sweetAlert('SIXMAB', 'Contactar con el equipo de asistencia de SIXMAB', 'warning');                        }
                });
            }
            else{
                sweetAlert('SIXMAB', 'Acción cancelada por el Usuario', 'warning');
            }
        });
        } 

        function activate(url, id){

        Swal.fire({
            title: 'Estás Seguro de Activar?',
            text: "Esta Batería!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: 'Si, Activar!'
        })
        .then( (result) => {
            if (result.value) {
            
                $.post(url, {'_method': 'patch', '_token': '{{ csrf_token() }}'}, function(resp){
                    if(resp){
                        Swal.fire({
                            icon: 'success',
                            title: 'SIXMAB',
                            text: 'Batería Activada',
                            showConfirmButton: false
                        })
                        setTimeout(function () { location.reload(1); }, 2000);
                    }else{
                        sweetAlert('SIXMAB', 'Contactar con el equipo de asistencia de SIXMAB', 'warning');                        }
                });
            }
            else{
                sweetAlert('SIXMAB', 'Acción cancelada por el Usuario', 'warning');
            }
        });
    }   
</script>