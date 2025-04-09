@extends('layouts.layouts')

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/eliminar.js")}}" type="text/javascript"></script>
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
                text: "Esta Planta!",
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
                            $('.planta-'+id).remove();
                            Swal.fire({
                                icon: 'success',
                                title: 'SIXMAB',
                                text: 'Planta Desactivada',
                                showConfirmButton: false
                            })
                            setTimeout(function () { location.reload(1); }, 2000);
                        }else{
                            sweetAlert('SIXMAB', 'Contactar con el equipo de asistencia de SIXMAB', 'warning');                        
                        }
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
                text: "Esta Planta!",
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
                                text: 'Planta Activada',
                                showConfirmButton: false
                            })
                            setTimeout(function () { location.reload(1); }, 2000);
                        }else{
                            sweetAlert('SIXMAB', 'Contactar con el equipo de asistencia de SIXMAB', 'warning');                        
                        }
                    });
                }
                else{
                    sweetAlert('SIXMAB', 'Acción cancelada por el Usuario', 'warning');
                }
            });
        }  
    </script>
@endsection

@section('titulo')
    <div class="col-sm-6 float-right po1" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active" aria-current="page">Empresa: {{$empresa->siglas}}</li>
            @if(count($plantas) === 1)
                <li class="breadcrumb-item">{{ __('adminlte::adminlte.plant') }}</li>
            @else
                <li class="breadcrumb-item">{{ __('adminlte::adminlte.plants') }}</li>
            @endif
        </ol>
    </div>
    <div class="ico-sixmab1 pl2 pl1">
        <i class="fas fa-city"></i>
        @if(count($plantas) === 1)
            <span class="ml-2">{{ __('adminlte::adminlte.plant') }}</span>
        @else
            <span class="ml-2">{{ __('adminlte::adminlte.plants') }}</span>
        @endif
    </div>
    <div class="w-100 pl2">
        @can('plantas.create')
            <div class="box-header with-border">            
                <a href="{{route('empresas.plantas.create', ['empresa' => $empresa->id])}}" class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.create-record') }}</span></a>
            </div>
        @endcan
        <a href="{{route('empresas.index')}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="row ssa1" id="dist">
        @if(count($plantas)>0)
            <div class="box-body">
                <div id="pricing-table">
                    <tbody>
                        @foreach ($plantas as $planta)
                            <tr>
                                <div class="plan"> 
                                    @if($planta->estado == true)                   
                                        <h3 class="text-dark">{{ $planta->siglas }}
                                    @else
                                        <h3 class="text-dark" style="color: #dc3545 !important;">{{ $planta->siglas }}
                                    @endif                             
                                        <span>
                                            <a href="{{route('plantas.maquinarias.index', ['planta' => $planta->id])}}">
                                                @if($planta->estado == true)                   
                                                    <i class="fas fa-city mt-4 color-ico tooltipsC" style="font-size: 2.2em; color:#777;" title="{{ $planta->nombre }}"></i>
                                                @else
                                                    <i class="fas fa-city mt-4 color-ico tooltipsC" style="font-size: 2.2em; color:#dc3545; z-index:1" title="{{ $planta->nombre }}"></i>
                                                    <div style="font-size: 13px; top: 16px; position: relative; color: #dc3545; height: 0;">Desactivada</div>
                                                @endif                                  
                                            </a>
                                        </span>
                                    </h3>  
                                    <div> 
                                        <td align="center" style="border-left: 1px solid #dee2e6; width: 140px !important;">   
                                            @can('plantas.show')
                                                <a onclick="ver('{{route('plantas.show', ['planta' => $planta->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                                    <i class="fas fa-eye"></i> 
                                                </a>
                                            @endcan
                                            @can('plantas.edit')  
                                                <a href="{{route('plantas.edit', ['planta' => $planta->id])}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                            @endcan
                                            @can('plantas.destroy')                            
                                                <form action="{{route('plantas.destroy', ['planta' => $planta->id])}}" class="d-inline form-eliminar" method="POST">
                                                    @csrf @method("delete")
                                                    <button type="submit" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>                                       
                                            @endcan
                                            @can('plantas.inhabilitar') 
                                                @if($planta->estado == true)                 
                                                    <a onclick="deactivate('{{route('plantas.deactivate', ['planta' => $planta->id])}}', {{$planta->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                                        <i class="fas fa-power-off"></i> 
                                                    </a>  
                                                @else
                                                    <a onclick="activate('{{route('plantas.activate', ['planta' => $planta->id])}}', {{$planta->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
                                                        <i class="fas fa-power-off"></i> 
                                                    </a>  
                                                @endif
                                            @endcan
                                            @can('baterias.bateria') 
                                                <a href="{{route('plantas.baterias', ['planta' => $planta->id])}}" class="tooltipsC btn btn-sm btn-secondary" title="Ver Baterías">
                                                    <i class="fas fa-car-battery"></i>
                                                </a> 
                                            @endcan
                                        </td>
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
                    <font style="vertical-align: inherit;">No se encuentran registros para este periodo.</font>
                    <font style="vertical-align: inherit;"><br>Por favor ingrese una planta.</font>
                </font>
            </div>
        @endif
    </div>
@stop