@extends('layouts.layouts')

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/eliminar.js")}}" type="text/javascript"></script>
@endsection

@section('titulo')
    <div class="col-sm-6 float-right po1" style="font-size:15px; bottom:12px; position: relative;">
        <ol class="breadcrumb float-sm-right">
            <spam class="mr-2">Empresa:</spam>        
            <li class="breadcrumb-item"><a href=" {{route('empresas.plantas.index', ['empresa' => $planta->empresa->id])}}">{{$planta->empresa->siglas}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$planta->siglas}}</li>
            @if(count($maquinarias) === 1)
                <li class="breadcrumb-item">{{ __('adminlte::adminlte.system') }}</li>
            @else
                <li class="breadcrumb-item">{{ __('adminlte::adminlte.systems') }}</li>
            @endif
        </ol>
    </div>
    <div class="ico-sixmab1">
        <img alt="" class="header-ico" src="{{asset('img/ts-n.png')}}" style="width: 1.5em; float: left;"/>
        @if(count($maquinarias) === 1)
            <span class="ml-2 header-ico">{{ __('adminlte::adminlte.system') }}</span>
        @else
            <span class="ml-2 header-ico">{{ __('adminlte::adminlte.systems') }}</span>
        @endif
    </div>
    <div class="w-100 alto1 alto2">
        @can('maquinarias.create')
            <div class="box-header with-border">            
                <a href="{{route('plantas.maquinarias.create', ['planta' => $planta->id])}}" class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.create-record') }}</span></a>
            </div>
        @endcan
        <a href="{{route('empresas.plantas.index', ['empresa' => $planta->empresa_id])}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="row ssa1" id="dist">
        @if(count($maquinarias)>0)
            <div class="box-body">
                <div id="pricing-table">
                    <tbody>
                        @foreach ($maquinarias as $item)
                            <tr>
                                <div class="plan"> 
                                    @if($item->estado == true)                   
                                        <h3 class="text-dark">{{ $item->siglas }}
                                    @else
                                        <h3 class="text-dark" style="color: #dc3545 !important;">{{ $item->siglas }}
                                    @endif                             
                                        <span>
                                            <a href="{{route('maquinarias.baterias.index', ['maquinaria' => $item->id])}}">
                                            @if($item->estado == true)  
                                                @if (strpos($item->tipo_maquinaria->icono, "img") === false)
                                                    <i class="fas fa-{{ $item->tipo_maquinaria->icono }} mt-4 color-ico tooltipsC" style="font-size: 2.3em; color:#777;" title="{{ $item->codigo }}"></i>
                                                @else
                                                    <img alt="" style="width: 3.0em; top: 13px; position: relative;" class="tooltipsC" onmouseout="this.src='{{asset($item->tipo_maquinaria->icono)}}';" onmouseover="this.src='{{asset('img/maquinaria/maquina1.png')}}';" src="{{asset($item->tipo_maquinaria->icono)}}" title="{{ $item->codigo }}"/>
                                                @endif
                                            @else
                                                @if (strpos($item->tipo_maquinaria->icono, "img") === false)
                                                    <i class="fas fa-{{ $item->tipo_maquinaria->icono }} mt-4 color-ico tooltipsC" style="font-size: 2.3em; color:#dc3545;" title="{{ $item->codigo }}"></i>
                                                    <div style="font-size: 13px; top: 17px; position: relative; color: #dc3545; height: 0;">Desactivada</div>
                                                @else
                                                    <img alt="" style="width: 3.0em; top: 13px; position: relative;" class="tooltipsC" onmouseout="this.src='{{asset('img/maquinaria/maquina2.png')}}';" onmouseover="this.src='{{asset('img/maquinaria/maquina1.png')}}';" src="{{asset('img/maquinaria/maquina2.png')}}" title="{{ $item->codigo }}"/>
                                                    <div style="font-size: 13px; top: 22px; position: relative; color: #dc3545; height: 0;">Desactivada</div>
                                                    @endif
                                            @endif                              
                                            </a>
                                        </span>
                                    </h3>  
                                    <div> 
                                        <td align="center" style="border-left: 1px solid #dee2e6; width: 140px !important;">   
                                            @can('maquinarias.show')
                                                <a onclick="ver('{{route('maquinarias.show', ['maquinaria' => $item->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                                    <i class="fas fa-eye"></i> 
                                                </a>
                                            @endcan
                                            @can('maquinarias.edit')  
                                                <a href="{{route('maquinarias.edit', ['maquinaria' => $item->id])}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                            @endcan
                                            @can('maquinarias.destroy')                            
                                                <form action="{{route('maquinarias.destroy', ['maquinaria' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                                                    @csrf @method("delete")
                                                    <button type="submit" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>                                       
                                            @endcan
                                            @can('maquinarias.inhabilitar') 
                                                @if($item->estado == true)                 
                                                    <a onclick="deactivate('{{route('maquinarias.deactivate', ['maquinaria' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                                        <i class="fas fa-power-off"></i> 
                                                    </a>  
                                                @else
                                                    <a onclick="activate('{{route('maquinarias.activate', ['maquinaria' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
                                                        <i class="fas fa-power-off"></i> 
                                                    </a>  
                                                @endif
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
                    <font style="vertical-align: inherit;"><br>Por favor ingrese una maquinaria.</font>
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
            text: "Esta Maquinaria!",
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
                            text: 'Maquinaria Desactivada',
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
            text: "Esta Maquinaria!",
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
                            text: 'Maquinaria Activada',
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