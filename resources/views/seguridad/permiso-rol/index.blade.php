@extends('layouts.layouts')

@section('titulo')
    <i class="fa fa-user-times"></i>&ensp;{{ __('adminlte::adminlte.permissions_roles') }}
@stop

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/permiso-rol/index.js")}}" type="text/javascript"></script>
    <script src="{{asset("assets/pages/scripts/seguridad/tabla.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')

@include('includes.mensaje')
    <div class="box-body">
        <table class="table" data-order='[[ 0, "asc" ]]' data-page-length='100' style="border: 1px solid #dee2e6;" id="pricing-table">
            <thead class="thead-dark">
                <tr align="center">
                    <th scope="col">Permiso</th>
                    @foreach ($rols as $id => $name)
                        <th scope="col" style="border-left: 1px solid #8e8e8e;">{{$name}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($permisos as $key => $permiso)
                    <tr class="text-center" id="permiso_{{$permiso->id}}">
                        <td class="text-left">{{$permiso["name"]}}</td>
                        @foreach ($rols as $id => $name)
                            <td class="text-center" style="border-left: 1px solid #dee2e6;">
                                @can('guardar_permiso_rol.store')
                                    <input  
                                    type="checkbox" 
                                    class="permission_role" 
                                    name="permission_role[]" 
                                    data-permisoid={{$permiso[ "id"]}} value="{{$id}}" {{in_array($id, array_column($permisosRols[$permiso["id"]], "id"))? "checked" : ""}}>
                                @endcan
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop