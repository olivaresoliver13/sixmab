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
    </script>
@endsection

@section('titulo')
    @can('permisos.create')
        <div class="w-100 alto">
            <div class="box-header with-border">
                <a href="{{route('permisos.create')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1">&nbsp;</i>{{ __('adminlte::adminlte.create-record') }}</a> 
            </div>
        </div>
    @endcan
    @if(count($permisos) === 1)
        <i class="fas fa-user-tag"></i><span class="ml-2">Permiso</span>
    @else
        <i class="fa fa-unlock-alt"></i>&ensp;{{ __('adminlte::adminlte.permissions') }}
    @endif
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="box-body">
        @if(count($permisos)>0)
            <table class="table" data-order='[[ 0, "asc" ]]' data-page-length='100' style="border: 1px solid #dee2e6;" id="pricing-table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Nombre</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Slug</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Descripción</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $permiso)
                        <tr class="text-center" id="permiso_{{$permiso->id}}">
                            <td class="text-left">{{$permiso['name']}}</td>
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">{{$permiso['slug']}}</td>
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">{{$permiso['description']}}</td>
                            <td class="text-center" style="border-left: 1px solid #dee2e6; width: 130px !important;">
                                @can('permisos.show')
                                    <a onclick="ver('{{route('permisos.show', ['permiso' => $permiso->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                        <i class="fas fa-eye"></i> 
                                    </a>
                                @endcan
                                @can('permisos.edit') 
                                    <a href="{{route('permisos.edit', $permiso->id)}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                @endcan
                                @can('permisos.destroy')                            
                                    <form action="{{route('permisos.destroy', $permiso->id)}}" class="d-inline form-eliminar" method="POST">
                                        @csrf @method("delete")
                                        <button type="submit" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>  
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
                    <font style="vertical-align: inherit;"><br>Por favor ingrese un permiso.</font>
                </font>
            </div>
        @endif
    </div>
@stop