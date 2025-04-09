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
                text: "Este Usuario!",
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
                            Swal.fire({
                                icon: 'success',
                                title: 'SIXMAB',
                                text: 'Usuario Desactivado',
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
                text: "Este Usuario!",
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
                                text: 'Usuario Activado',
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
@endsection

@section('titulo')
    @can('usuarios.create')
        <div class="w-100 alto">
            <div class="box-header with-border">
                <a href="{{route('usuarios.create')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white" style="width: 130px;"><i class="fa fa-fw fa-plus-circle">&nbsp;</i>{{ __('adminlte::adminlte.create-record') }}</a> 
            </div>
        </div>
    @endcan
    @if(count($datas) === 1)
        <i class="fas fa-user"></i><span class="ml-2">{{ __('adminlte::adminlte.user') }}</span>
    @else
        <i class="fas fa-users"></i><span class="ml-2">{{ __('adminlte::adminlte.users') }}</span>
    @endif
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="box-body">
        @if(count($datas)>0)
            <table class="table" data-order='[[ 0, "asc" ]]' data-page-length='10' style="border: 1px solid #dee2e6;" id="pricing-table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Nombre</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Email</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Rol</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Empresa</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e; width: 40px;">Imagen</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Estado</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Privilegio</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="text-center" id="user_{{$data->id}}">
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">{{$data['name']}}</td>
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">{{$data['email']}}</td>
                            <td class="text-center" style="border-left: 1px solid #dee2e6;"> 
                                @foreach ($data->roles as $rol)
                                    {{$loop->last ? $rol->name : $rol->name . ', '}}
                                @endforeach
                            </td>
                            <td class="text-center" style="border-left: 1px solid #dee2e6;"> 
                                @foreach ($data->empresas as $empresa)
                                    {{$loop->last ? $empresa->nombre : $empresa->nombre . ', '}}
                                @endforeach
                            </td>
                            <td class="text-center" style="border-left: 1px solid #dee2e6;"> 
                                @if ($data->foto === Null)
                                    <img src="{{asset('img/usuario/user.png')}}" class="tooltipsC" title="{{ $data->name }}" style="width: 2em; top: 3px; position: relative; padding:0;" alt=""/>   
                                @else
                                    <img src="{{asset('img/usuario/'.$data->foto)}}" class="tooltipsC" title="{{ $data->name }}" style="width: 2em; top: 3px; position: relative; padding:0;" alt=""/>              
                                @endif 
                            </td> 
                            <td class="text-center" style="border-left: 1px solid #dee2e6; width: 100px !important;">
                                @if ($data['status'] == true)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td> 
                            <td class="text-center" style="border-left: 1px solid #dee2e6; width: 100px !important;">
                                @if ($data['privilege'] == true)
                                    <span class="badge badge-success">Activo</span>
                                @else
                                    <span class="badge badge-danger">Inactivo</span>
                                @endif
                            </td>
                            <td class="text-center" style="border-left: 1px solid #dee2e6; width: 180px !important;">
                                @can('usuarios.show')
                                <a onclick="ver('{{route('usuarios.show', ['usuario' => $data->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                    <i class="fas fa-eye"></i> 
                                </a>
                                @endcan
                                @can('usuarios.edit')
                                <a href="{{route('usuarios.edit', $data->id)}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                    <i class="fas fa-edit"></i> 
                                </a>
                                @endcan
                                @can('usuarios.destroy')                           
                                <form action="{{route('usuarios.destroy', $data->id)}}" class="d-inline form-eliminar" method="POST">
                                    @csrf @method("delete")
                                    <button type="submit" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                @endcan                              
                                @can('usuarios.inhabilitar') 
                                    @if($data->status == true)                 
                                        <a onclick="deactivate('{{route('usuarios.deactivate', ['usuario' => $data->id])}}', {{$data->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                            <i class="fas fa-power-off"></i> 
                                        </a>  
                                    @else
                                        <a onclick="activate('{{route('usuarios.activate', ['usuario' => $data->id])}}', {{$data->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
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
                    <font style="vertical-align: inherit;"><br>Por favor ingrese un usuario.</font>
                </font>
            </div>
        @endif
    </div>
@stop