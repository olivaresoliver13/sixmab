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
                text: "Esta Empresa!",
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
                            $('.empresa-'+id).remove();
                            Swal.fire({
                                icon: 'success',
                                title: 'SIXMAB',
                                text: 'Empresa Desactivada',
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
                text: "Esta Empresa!",
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
                                text: 'Empresa Activada',
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
    <div class="ico-sixmab1">
        <i class="fas fa-building"></i>
        @if(count($empresa) === 1)
            <span class="ml-2">{{ __('adminlte::adminlte.busines') }}</span>
        @else
            <span class="ml-2">{{ __('adminlte::adminlte.business') }}</span>
        @endif
    </div>
    @can('empresas.create')
        <div class="w-100" style="position: relative; bottom: 34px;">        
            <div class="box-header with-border">            
                <a href="{{route('empresas.create')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.create-record') }}</span></a>
            </div>        
        </div> 
    @endcan
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="row ssa1" id="dist">
        @if(count($empresa)>0)
            <div class="box-body">
                <div id="pricing-table">
                    <tbody>
                        @foreach ($empresa as $empresa)
                            <tr>
                                <div class="plan"> 
                                    @if($empresa->estado == true)                   
                                        <h3 class="text-dark">{{ $empresa->siglas }}
                                    @else
                                        <h3 class="text-dark" style="color: #dc3545 !important;">{{ $empresa->siglas }}
                                    @endif                             
                                        <span>
                                            <a href="{{route('empresas.plantas.index', ['empresa' => $empresa->id])}}">
                                                @if($empresa->estado == true)                   
                                                    <i class="fas fa-building mt-3 color-ico tooltipsC" style="font-size: 2.6em; color:#777;" title="{{ $empresa->nombre }}"></i>
                                                @else
                                                    <i class="fas fa-building mt-3 color-ico tooltipsC" style="font-size: 2.6em; color:#dc3545; z-index:1" title="{{ $empresa->nombre }}"></i>
                                                    <div style="font-size: 13px; top: 16px; position: relative; color: #dc3545; height: 0;">Desactivada</div>
                                                @endif                                  
                                            </a>
                                        </span>
                                    </h3>  
                                    <div> 
                                        <td align="center" style="border-left: 1px solid #dee2e6; width: 140px !important;">   
                                            @can('empresas.show')
                                                <a onclick="ver('{{route('empresas.show', ['empresa' => $empresa->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                                    <i class="fas fa-eye"></i> 
                                                </a>
                                            @endcan
                                            @can('empresas.edit')  
                                                <a href="{{route('empresas.edit', ['empresa' => $empresa->id])}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                                    <i class="fas fa-edit"></i> 
                                                </a>
                                            @endcan
                                            @can('empresas.destroy')                            
                                                <form action="{{route('empresas.destroy', ['empresa' => $empresa->id])}}" class="d-inline form-eliminar" method="POST">
                                                    @csrf @method("delete")
                                                    <button type="submit" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>                                       
                                            @endcan
                                            @can('empresas.inhabilitar') 
                                                @if($empresa->estado == true)                 
                                                    <a onclick="deactivate('{{route('empresas.deactivate', ['empresa' => $empresa->id])}}', {{$empresa->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                                        <i class="fas fa-power-off"></i> 
                                                    </a>  
                                                @else
                                                    <a onclick="activate('{{route('empresas.activate', ['empresa' => $empresa->id])}}', {{$empresa->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
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
                    <font style="vertical-align: inherit;"><br>Por favor ingrese una empresa.</font>
                </font>
            </div>
        @endif
    </div>
@stop