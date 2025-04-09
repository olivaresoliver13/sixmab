@extends('layouts.layouts')

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/tabla.js")}}" type="text/javascript"></script>
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
                text: "Esta Composición Química!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
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
                                text: 'Composición Química Desactivada',
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
                text: "Esta Composición Química!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Activar!'
            })
            .then( (result) => {
                if (result.value) {
                    $.post(url, {'_method': 'patch', '_token': '{{ csrf_token() }}'}, function(resp){
                        if(resp){
                            Swal.fire({
                                icon: 'success',
                                title: 'SIXMAB',
                                text: 'Composición Química Activada',
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
        <i class="fas fa-atom"></i>      
        <span class="ml-2">Composición Química</span>
    </div>
    @can('composicion_quimica.create')
        <div class="w-100 pl3">        
            <div class="box-header with-border">            
                <a href="{{route('composicion_quimica.create')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.create-record') }}</span></a>
            </div>        
        </div> 
    @endcan
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="box-body">
        @if(count($composicion_quimica)>0)
            <table class="table" data-order='[[ 0, "desc" ]]' data-page-length='10' style="border: 1px solid #dee2e6;" id="pricing-table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Nombre</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Estado</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($composicion_quimica as $item)
                        <tr class="text-center" id="composicion_quimica_{{$item->id}}">
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">{{$item['nombre']}}</td>                        
                            <td class="text-center" style="border-left: 1px solid #dee2e6; width: 100px !important;">
                                @if ($item['estado'] == true)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center" style="border-left: 1px solid #dee2e6; width: 180px !important;">
                                @can('composicion_quimica.show')
                                    <a onclick="ver('{{route('composicion_quimica.show', ['composicion_quimica' => $item->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                        <i class="fas fa-eye"></i> 
                                    </a>
                                @endcan
                                @can('composicion_quimica.edit')
                                    <a href="{{route('composicion_quimica.edit', $item->id)}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                @endcan
                                @can('composicion_quimica.destroy')                         
                                    <form action="{{route('composicion_quimica.destroy', ['composicion_quimica' => $item->id])}}" class="d-inline form-eliminar" method="POST">
                                        @csrf 
                                        @method("delete")
                                        <button type="submit" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form> 
                                @endcan                             
                                @can('composicion_quimica.inhabilitar')
                                    @if($item->estado == true)                 
                                        <a onclick="deactivate('{{route('composicion_quimica.deactivate', ['composicion_quimica' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                            <i class="fas fa-power-off"></i> 
                                        </a>  
                                    @else
                                        <a onclick="activate('{{route('composicion_quimica.activate', ['composicion_quimica' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
                                            <i class="fas fa-power-off"></i> 
                                        </a>  
                                    @endif 
                                @endcan                                       
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info alert-dismissible col-lg-6 offset-md-3">
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
                    <font style="vertical-align: inherit;"><br>Por favor Ingrese una Composición Química.</font>
                </font>
            </div>
        @endif
    </div>
@stop