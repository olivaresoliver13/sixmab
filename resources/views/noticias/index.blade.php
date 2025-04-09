@extends('layouts.layouts')

@section('titulo')
    @can('noticias.create')
        <div class="w-100 alto1">
            <div class="box-header with-border">
                <a href="{{route('noticias.create')}}" class="btn btn-success btn-sm pull-right rounded-pill text-white" style="width: 130px;"><i class="fa fa-fw fa-plus-circle mr-1"></i>{{ __('adminlte::adminlte.create-record') }}</a> 
            </div>
        </div>
    @endcan
    <i class="far fa-newspaper"></i>
    @if(count($noticia) === 1)
        <span class="ml-2">{{ __('adminlte::adminlte.new') }}</span>
    @else
        <span class="ml-2">{{ __('adminlte::adminlte.news') }}</span>
    @endif
@stop

@section('contenido')
    @include('includes.mensaje')
    <div class="row">
        @if(count($noticia)>0)
            @foreach ($noticia as $item)
                <div id="pricing-table" class="text-left clear noticia-{{$item->id}}">
                    <div class="plan1">
                        @if ($item->foto === Null)
                            <img src="{{asset('img/noticia/noticias.png')}}" alt="" class="w-100"/>   
                        @else
                            <img src="{{asset('img/noticia/'.$item->foto)}}" alt="" class="w-100"/>              
                        @endif  
                        <br><br>
                        <h4>{{ $item->titulo  }}</h4> 
                        <div class="text-justify" style="min-height: 80px;"><h7>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $item->entradilla }}</h7></div><br><br>
                        <div class="text-right"><h7>Fecha de la publicación: {{ date('d M Y', $item->created_at->timestamp) }}</h7></div><br>                      
                        @can('noticias.show')
                            <div class="text-center" style="color: #848484;">
                                <a onclick="ver('{{route('noticias.show', ['noticia' => $item->id])}}')" class="btn-accion-tabla" title="Mostrar">Mas Información</a>
                            </div> 
                        @endcan            
                        <hr>
                        <div class="text-center"> 
                            @can('noticias.edit')  
                                <a href="{{route('noticias.edit', $item->id)}}" class="tooltipsC btn btn-sm btn-warning" title="Editar Registro">
                                    <i class="fas fa-edit"></i> 
                                </a>
                            @endcan
                            @can('noticias.destroy')                            
                                <a onclick="eliminar('{{route('noticias.destroy', ['noticia' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-danger" title="Eliminar Registro">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            @endcan
                            @can('noticias.inhabilitar') 
                                @if($item->estado == true)                 
                                    <a onclick="deactivate('{{route('noticias.deactivate', ['noticia' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-success" title="Desactivar Registro">
                                        <i class="fas fa-power-off"></i> 
                                    </a>  
                                @else
                                    <a onclick="activate('{{route('noticias.activate', ['noticia' => $item->id])}}', {{$item->id}})" class="tooltipsC btn btn-sm btn-danger" title="Activar Registro">
                                        <i class="fas fa-power-off"></i> 
                                    </a>  
                                @endif
                            @endcan
                        </div>
                    </div>
                </div>      
            @endforeach
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
                    <font style="vertical-align: inherit;"><br>Por favor Ingrese una Noticia.</font>
                </font>
            </div>
        @endif
    </div>
@stop

@section('scripts')
    <script>
        function ver(url){
            $.get(url, function(resp){
                $('#modal-content').html(resp);
                $('#modal').modal('toggle');
            });
        }

        function eliminar(url, id){

            Swal.fire({
                title: 'Estas seguro de eliminar esta noticia?',
                text: "No podras revertir los cambios!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: "Cancelar",
                confirmButtonText: 'Si, eliminalo!'
            })
            .then( (result) => {
                if (result.value) {
                
                    $.post(url, {'_method': 'DELETE', '_token': '{{ csrf_token() }}'}, function(resp){
                        if(resp){
                            $('.item-'+id).remove();
                            Swal.fire({
                                icon: 'success',
                                title: 'SIXMAB',
                                text: 'Noticia Eliminada',
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

        function deactivate(url, id){

            Swal.fire({
                title: 'Estás Seguro de Desactivar?',
                text: "Esta Noticia!",
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
                                text: 'Noticia Desactivada',
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
                text: "Esta Noticia!",
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
                                text: 'Noticia Activada',
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