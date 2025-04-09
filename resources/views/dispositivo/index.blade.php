@extends('layouts.layouts')

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#tabla_dispositivo').DataTable({
            "language": {
                "url": "{{asset('js/datatables_esp.json')}}"
            },
            ordering: false
            });

            $('.mostrar_esclavos').on('click', function(){
                icono = $(this).children();

                $(this).next('tbody').collapse('toggle');

                if(icono.hasClass('fa-plus-circle')){
                    icono.removeClass("text-green");
                    icono.addClass("text-danger");

                    icono.removeClass("fa-plus-circle");
                    icono.addClass("fa-minus-circle");
                } else {
                    icono.removeClass("text-danger");
                    icono.addClass("text-green");

                    icono.addClass("fa-plus-circle");
                    icono.removeClass("fa-minus-circle");
                }
            });

        });

        function ver(url){
            $.get(url, function(resp){
                $('#modal-content').html(resp);
                $('#modal').modal('toggle');
            });
        }

        function eliminar(url, id){
            Swal.fire({
                title: 'Estas seguro de eliminar este dispositivo?',
                text: "No podras revertir los cambios!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminalo!'
                }).then( (result) => {
                if (result.value) {                
                    $.post(url, {'_method': 'DELETE', '_token': '{{ csrf_token() }}'}, function(resp){
                        if(resp.rs){
                            //remueve el item de la vista
                            $('#dispositivo_'+id).remove();
                        }
                        Swal.fire({
                            icon: 'success',
                            title: 'SIXMAB',
                            text: 'Registro Eliminado',
                            showConfirmButton: false
                        })
                        setTimeout(function () { location.reload(1); }, 2000);
                    });
                }
                else{
                    sweetAlert('SIXMAB', 'Acción cancelada por el Usuario', 'warning');
                }
            });
        }

        function deactivate(url, id){
            Swal.fire({
                title: 'Estás Seguro de Desactivar?',
                text: "Este Registro!",
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
                            $('#dispositivo_'+id).remove();
                            Swal.fire({
                                icon: 'success',
                                title: 'SIXMAB',
                                text: 'Registro Desactivado',
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
                text: "Este Registro!",
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
                                text: 'Registro Activado',
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
    <div class="ico-sixmab1">
        <i class="fa fa-rss"></i>
        @if(count($dispositivos) === 1)
            <span class="ml-2">{{ __('adminlte::adminlte.device') }}</span>
        @else
            <span class="ml-2">{{ __('adminlte::adminlte.devices') }}</span>
        @endif
    </div>
    @can('dispositivos.create')
        <div class="w-100" style="position: relative; bottom: 34px;">        
            <div class="box-header with-border">            
                <a href="{{route('dispositivos.create')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white class-volver" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1 tam-ico"></i><span id="bottom-ico">{{ __('adminlte::adminlte.create-record') }}</span></a>
            </div>        
        </div> 
    @endcan
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="box-body">
        <br>
        <table class="table" style="border: 1px solid #dee2e6;">
            <thead class="thead-dark">
                <tr align="center">
                    <th style="width: 20px;"></th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">N°</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Identificador</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Tipo dispositivo</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e; width: 50px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dispositivos as $dispositivo)
                    <tr align="center" id="dispositivo_{{$dispositivo->id}}">
                        <td class="mostrar_esclavos" data-toggle="collapse" data-target="#maestro_{{$dispositivo->id}}" aria-expanded="false" aria-controls="maestro_{{$dispositivo->id}}"><i class="fa fa-plus-circle text-green"></i></td>
                        <td style="border-left: 1px solid #dee2e6;">{{$loop->iteration}}</td>
                        <td style="border-left: 1px solid #dee2e6; text-align:left;">{{$dispositivo->identificador}}</td>
                        <td style="border-left: 1px solid #dee2e6;">{{$dispositivo->tipo()}}</td>
                        <td style="border-left: 1px solid #dee2e6;">
                            @can('dispositivos.show')
                                <a onclick="ver('{{route('dispositivos.show', ['dispositivo' => $dispositivo->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                    <i class="fas fa-eye"></i> 
                                </a>
                            @endcan
                            @can('dispositivos.edit')
                                <a href="{{route('dispositivos.edit', ['dispositivo' => $dispositivo->id])}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                    <i class="fas fa-edit"></i> 
                                </a>
                            @endcan
                            @can('dispositivos.destroy')
                                <a onclick="eliminar('{{route('dispositivos.destroy', ['dispositivo' => $dispositivo->id])}}', {{$dispositivo->id}})" href="#" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            @endcan
                            @can('dispositivos.inhabilitar') 
                                @if($dispositivo->estado == true)                 
                                    <a onclick="deactivate('{{route('dispositivos.deactivate', ['dispositivo' => $dispositivo->id])}}', {{$dispositivo->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                        <i class="fas fa-power-off"></i> 
                                    </a>  
                                @else
                                    <a onclick="activate('{{route('dispositivos.activate', ['dispositivo' => $dispositivo->id])}}', {{$dispositivo->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
                                        <i class="fas fa-power-off"></i> 
                                    </a>  
                                @endif
                            @endcan
                        </td>
                    </tr>                               
                    <tbody id="maestro_{{$dispositivo->id}}" class="collapse multi-collapse" style="background-color: #e9ecef;">
                        @foreach ($dispositivo->esclavos as $esclavo)
                            <tr align="center" id="dispositivo_{{$esclavo->id}}">
                                <td><i class="fa fa-arrow-right float-right"></i></td>
                                <td style="border-left: 1px solid #dee2e6;">{{$loop->parent->iteration}}-{{$loop->iteration}}</td>
                                <td style="border-left: 1px solid #dee2e6; text-align:left;">{{$esclavo->identificador}}</td>
                                <td style="border-left: 1px solid #dee2e6;">{{$esclavo->tipo()}}</td>
                                <td style="border-left: 1px solid #dee2e6;">
                                    @can('dispositivos.show')
                                        <a onclick="ver('{{route('dispositivos.show', ['dispositivo' => $esclavo->id])}}')" class="tooltipsC btn btn-sm btn-primary" title="Mostrar Registro">
                                            <i class="fas fa-eye"></i> 
                                        </a>
                                    @endcan
                                    @can('dispositivos.edit')
                                        <a href="{{route('dispositivos.edit', ['dispositivo' => $esclavo->id])}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                            <i class="fas fa-edit"></i> 
                                        </a>
                                    @endcan
                                    @can('dispositivos.destroy')
                                        <a onclick="eliminar('{{route('dispositivos.destroy', ['dispositivo' => $esclavo->id])}}', {{$esclavo->id}})" href="#" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    @endcan                                
                                    @can('dispositivos.inhabilitar') 
                                        @if($esclavo->estado == true)                 
                                            <a onclick="deactivate('{{route('dispositivos.deactivate', ['dispositivo' => $esclavo->id])}}', {{$esclavo->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                                <i class="fas fa-power-off"></i> 
                                            </a>  
                                        @else
                                            <a onclick="activate('{{route('dispositivos.activate', ['dispositivo' => $esclavo->id])}}', {{$esclavo->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
                                                <i class="fas fa-power-off"></i> 
                                            </a>  
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endforeach
            </tbody>
        </table>
    </div> 
@stop