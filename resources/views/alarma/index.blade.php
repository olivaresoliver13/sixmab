@extends('layouts.layouts')

@section('scripts')
  <script src="{{asset("assets/pages/scripts/seguridad/tabla.js")}}" type="text/javascript"></script>
  <script>
    $(document).ready( function () {
      $('#tabla_alarmas').DataTable({
        "language": {
          "url": "{{asset('js/datatables_esp.json')}}"
        },
        ordering: false
      });
    });
  </script>
@endsection

@section('titulo')
  <div class="ico-sixmab1">
    <i class="fas fa-bell"></i>      
    <span class="ml-2">Alarmas</span>
  </div>
@stop

@section('contenido')
  <div class="box-body">
    @if(count($alarmas_not)>0)
      <table class="table table-hover text-center" data-order='[[ 0, "desc" ]]' data-page-length='10' style="border: 1px solid #dee2e6;" id="pricing-table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" style="width: 5%;"></th>
            <th style="text-align: center !important;" scope="col">Batería</th>
            <th scope="col">Hora medición</th>
            <th scope="col">Fecha medición</th>
            <th scope="col">Solucionado</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($alarmas_not as $notificacion)    
            <tr onclick="ir_detalle({{$notificacion['alarma_id']}})">
              <td class="col-md-1" style="width: 5%;">
                @if($notificacion['nuevo'])
                  <i class="fa fa-envelope" style="color: #f39c12;"></i>
                @elseif(!$notificacion['leida'])
                  <i class="fa fa-envelope" style="color: #cdcdce;"></i>
                @endif
              </td>
              <td>{{$notificacion['bateria']->numero_bateria}}</td>
              <td>{{$notificacion['hora']}}</td>
              <td>{{$notificacion['fecha']}}</td>
              <td>{{$notificacion['alarma_estado'] ? 'Si' : 'No'}}</td>
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
          <font style="vertical-align: inherit;">No se encuentran registros.</font>
        </font>
      </div>
    @endif
  </div>

  <script>
    function ir_detalle(alarma_id){
      @if(count($alarmas_not) > 0)
        $.get('/alarmas/actualizar/'+alarma_id, function(resp){
          if(resp){
            location.href='alarmas/'+alarma_id;
          }
        });
      @endif
    }
  </script>
@stop