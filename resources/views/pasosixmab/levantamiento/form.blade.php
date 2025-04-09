<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<link rel="stylesheet" href="{{asset("css/yearpicker.css")}}">

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <style>
    .container { margin: 150px auto;  }
  </style>
</script>

<span style="color: #888888">Historial</span>
<hr>
<div class="form-group row">
  <label for="fecha_compra" class="col-sm-3 col-form-label requerido text-left">Año de Compra</label>
  <div class="col-sm-9">
    <input type="number" class="yearpicker form-control" name="fecha_compra" id="fecha_compra" value="{{old('fecha_compra', $data->fecha_compra ?? '')}}" data-toggle="tooltip" title="Ingrese el Año de la Compra" required/>  
  </div>
</div>
<div class="form-group row">
  <label for="tipotrabajo" class="col-sm-3 requerido col-form-label text-left">Tipo de Trabajo</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Tipo de Trabajo" name="tipo_trabajo_id" id="tipo_trabajo_id" required>  
    @foreach ($tipotrabajo as $item)
        @if (isset($data->tipo_trabajo_id))
          @if ($data->tipo_trabajo_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="tipocuidado" class="col-sm-3 requerido col-form-label text-left">Tipo de Cuidado</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Tipo de Cuidado" name="tipo_cuidado_id" id="tipo_cuidado_id" required>  
    @foreach ($tipocuidado as $item)
        @if (isset($data->tipo_cuidado_id))
          @if ($data->tipo_cuidado_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="vasocambiado" class="col-sm-3 requerido col-form-label text-left">Vaso Cambiado</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Vaso Cambiado" name="vaso_cambiado_id" id="vaso_cambiado_id" required>  
    @foreach ($vasocambiado as $item)
        @if (isset($data->vaso_cambiado_id))
          @if ($data->vaso_cambiado_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="fecha" class="col-sm-3 col-form-label requerido text-left">Fecha</label>
  <div class="col-sm-9">
    <input type="date" data-toggle="tooltip" title="Ingrese una Fecha" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="{{old('fecha', $data->fecha ?? '')}}" minlength="10" maxlength="10" required />  
  </div>
</div>
<div class="form-group row">
  <label for="nota" class="col-sm-3 col-form-label text-left">Nota</label>
  <div class="col-sm-9">
    <textarea data-toggle="tooltip" name="nota" id="nota" class="form-control" rows="2" id="comment" title="Ingrese una Nota" placeholder="Nota" minlength="1" maxlength="500">{{old('nota', $data->nota ?? '')}}</textarea>
  </div>
</div>

<hr>
  <span style="color: #888888">Chequeo Visual</span>
<hr>

<div class="form-group row">
  <label for="danofisico" class="col-sm-3 requerido col-form-label text-left">Daño físico</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Daño físico" name="dano_fisico_id" id="dano_fisico_id" required>  
    @foreach ($danofisico as $item)
        @if (isset($data->dano_fisico_id))
          @if ($data->dano_fisico_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="fuga" class="col-sm-3 requerido col-form-label text-left">Fuga</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Fuga" name="fuga_id" id="fuga_id" required>  
    @foreach ($fuga as $item)
        @if (isset($data->fuga_id))
          @if ($data->fuga_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="desbordamientoacido" class="col-sm-3 requerido col-form-label text-left">Desbordamiento de Ácido</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Desbordamiento de Ácido" name="desbordamiento_acido_id" id="desbordamiento_acido_id" required>  
    @foreach ($desbordamientoacido as $item)
        @if (isset($data->desbordamiento_acido_id))
          @if ($data->desbordamiento_acido_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="nivelbajoelectrolito" class="col-sm-3 requerido col-form-label text-left">Nivel Bajo de Electrólito</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Nivel Bajo de Electrólito" name="nivel_bajo_electrolito_id" id="nivel_bajo_electrolito_id" required>  
    @foreach ($nivelbajoelectrolito as $item)
        @if (isset($data->nivel_bajo_electrolito_id))
          @if ($data->nivel_bajo_electrolito_id == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="codigo" class="col-sm-3 col-form-label requerido text-left">Puente Defectuoso/Oxidado</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Puente Defectuoso/Oxidado" class="form-control" name="puente_defectuoso_oxidado" id="puente_defectuoso_oxidado" placeholder="Puente Defectuoso/Oxidado" value="{{old('puente_defectuoso_oxidado', $data->puente_defectuoso_oxidado ?? '')}}" min="1" max="80" required />
  </div>
</div>
<div class="form-group row">
  <label for="polo_levantado" id="polo_levantado" class="col-sm-2 col-form-label text-left requerido">Polo Levantado</label>  
  <div class="col-sm-5">
    <input type="radio" name="polo_levantado" data-toggle="tooltip" title="Seleccione una Opción" value="1" {{ 1 == old('polo_levantado', $data->polo_levantado ?? '') ? 'checked' : '' }}>&nbsp; Positivo &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="polo_levantado" data-toggle="tooltip" title="Seleccione una Opción" value="0" {{ 0 == old('polo_levantado', $data->polo_levantado ?? '') ? 'checked' : '' }}>&nbsp; Negativo
  </div>
  <label for="oxidacion_fuerte" id="oxidacion_fuerte" class="col-sm-2 col-form-label text-left requerido">Oxidación Fuerte</label>
  <div class="col-sm-2">
    <input type="radio" name="oxidacion_fuerte" data-toggle="tooltip" title="Seleccione una Opción" value="1" {{ 1 == old('oxidacion_fuerte', $data->oxidacion_fuerte ?? '') ? 'checked' : '' }}>&nbsp; Si &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="oxidacion_fuerte" data-toggle="tooltip" title="Seleccione una Opción" value="0" {{ 0 == old('oxidacion_fuerte', $data->oxidacion_fuerte ?? '') ? 'checked' : '' }}>&nbsp; Negativo
  </div>
</div>
<div class="form-group row">
  <label for="otro" class="col-sm-3 col-form-label text-left">Otro</label>
  <div class="col-sm-9">
    <textarea data-toggle="tooltip" name="otro" id="otro" class="form-control" rows="2" id="comment" title="Ingrese el Campo Otro" placeholder="Otro" minlength="1" maxlength="500">{{old('otro', $data->otro ?? '')}}</textarea>
  </div>
</div>

@section('scripts')
  <script>
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';

    $(document).on('change', '#tipo_bateria', function(){

      const tipo_bateria = $(this).val();
      
      if(tipo_bateria == 1){
        $('#label_cca_o_impedancia').text('CCA');
      } else if(tipo_bateria == 2){
        $('#label_cca_o_impedancia').text('');
      } else if(tipo_bateria == 3){
        $('#label_cca_o_impedancia').text('Impedancia');
      } 
      $('#cca_o_impedancia').css('display', 'block');
    });
  </script>
  
  <script src="{{asset("js/yearpicker.js")}}"></script>
  <script>
    $(document).ready(function() {
      $(".yearpicker").yearpicker({
        year: 2021,
        startYear: 2000,
        endYear: 2021
      });
    });
  </script>
@endsection