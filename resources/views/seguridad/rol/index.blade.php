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
    @can('roles.create')
        <div class="w-100 alto">
            <div class="box-header with-border">
                <a href="{{route('roles.create')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white" style="width: 130px;"><i class="fa fa-fw fa-plus-circle">&nbsp;&nbsp;&nbsp;</i>{{ __('adminlte::adminlte.create-record') }}</a> 
            </div>
        </div>
    @endcan
    @if(count($roles) === 1)
        <i class="fas fa-user-tag"></i><span class="ml-2">{{ __('adminlte::adminlte.role') }}</span>
    @else
        <i class="fas fa-user-tag"></i><span class="ml-2">{{ __('adminlte::adminlte.roles') }}</span>
    @endif
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="box-body">
        @if(count($roles)>0)
            <table class="table" data-order='[[ 0, "asc" ]]' data-page-length='100' style="border: 1px solid #dee2e6;" id="pricing-table">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th scope="col">Nombre</th>
                        <th style="border-left: 1px solid #8e8e8e;">Slug</th>
                        <th style="border-left: 1px solid #8e8e8e;">Descripción</th>
                        <th style="border-left: 1px solid #8e8e8e;">Tipo de Acceso</th>
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                        <tr class="text-center" id="item_{{$item->id}}">
                            <td class="text-left">{{$item->name}}</td>
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">{{$item->slug}}</td>
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">{{$item->description}}</td>
                            <td class="text-left" style="border-left: 1px solid #dee2e6;">
                                @if ($item->special === Null)
                                    Varios permisos
                                @else
                                    {{$item->special}}                          
                                @endif 
                            </td>
                            <td class="text-center" style="border-left: 1px solid #dee2e6; width: 130px !important;">
                                @can('roles.show')
                                    <a onclick="ver('{{route('roles.show', ['role' => $item->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                        <i class="fas fa-eye"></i> 
                                    </a>
                                @endcan
                                @can('roles.edit')
                                    <a href="{{route('roles.edit', $item->id)}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                        <i class="fas fa-edit"></i> 
                                    </a>
                                @endcan
                                @can('roles.destroy')                           
                                    <form action="{{route('roles.destroy', $item->id)}}" class="d-inline form-eliminar" method="POST">
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
                    <font style="vertical-align: inherit;"><br>Por favor ingrese un rol.</font>
                </font>
            </div>
        @endif
    </div>
@stop