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
    </script>
@endsection

@section('titulo')
    <div class="ico-sixmab1">
        <img alt="" class="header-ico" src="{{asset('img/sixmab.png')}}" style="width: 1.5em; float: left;"/>
        <span class="ml-2">Datos de Medición</span>
    </div>
@stop

<style>
    #pricing-table h3 span {
        height: 76px !important;
        width: 211px !important;
        font: 25px/100px arial !important;
    }
</style>

@section('contenido')
    @include('includes.mensaje')
    <div class="row ssa1" id="dist">
        @if(count($cantidad)>0)
            <div class="box-body">
                <div id="pricing-table">
                    <tbody>
                        @foreach ($cantidad as $item)
                            <tr>
                                <div class="plan">                   
                                    <h3 class="text-dark">{{ $item->identificador }}                   
                                        <span>             
                                            <div style="z-index: 1; bottom: 19px; position: relative;">{{ $item->total }}</div>
                                        </span>
                                    </h3>  
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
                </font>
            </div>
        @endif
    </div>
@stop