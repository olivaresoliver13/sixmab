<div class="form-group row">
    <label for="identificador" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.identifier') }}</label>
    <div class="col-sm-10">
      <input type="text" data-toggle="tooltip" title="Ingrese el Identificador" class="form-control" name="identificador" id="identificador" placeholder="Identificador" value="{{old('identificador', $data->identificador ?? '')}}" minlength="1" maxlength="255" required/>
    </div>
</div>
<div class="form-group row">
  <label for="tipo_dispositivo" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.device-type') }}</label>
  <div class="col-sm-10">
    <select class="form-control" data-toggle="tooltip" title="Seleccione el Tipo de Dispositivo" name="tipo_dispositivo" id="tipo_dispositivo" required {{(isset($data->esclavos) ? 'disabled' : '')}}>
      <option value="" disabled selected>Elige una opción</option>
      @foreach ($tipos as $item)
        @isset($data)
          <option value="{{$item['val']}}" {{ $data->tipo_dispositivo == $item['val'] ? 'selected' : ''}}>{{$item['nombre']}}</option>
        @else
          <option value="{{$item['val']}}">{{$item['nombre']}}</option>
        @endisset
      @endforeach
    </select>
  </div>
</div>
<div id="dispositivo_maestro" style="display: none;">
  <div class="form-group row">
    <label for="maestro_id" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.teacher') }}</label>
    <div class="col-sm-10">
      <select class="form-control" data-toggle="tooltip" title="Seleccione el Dispositivo Maestro" name="maestro_id" id="maestro_id" required>
        <option value="">Seleccione dispositivo maestro</option>
        @foreach ($maestros as $item)
          @isset($data)
            <option value="{{$item->id}}" {{ $data->maestro_id == $item->id ? 'selected' : '' }} >{{$item->identificador}}</option>
          @else
            <option value="{{$item->id}}" >{{$item->identificador}}</option>
          @endisset
        @endforeach
      </select>
    </div>
  </div>
</div>
<div id="detalle" style="display: none;">
  <div class="form-group row">
    <label for="voltaje" class="col-sm-3 col-form-label requerido text-left">Voltaje Máximo</label>
    <div class="col-sm-3">
      <input type="number" data-toggle="tooltip" title="Ingrese el Voltaje Máximo" class="form-control limites" name="voltaje_max" id="voltaje_max" placeholder="Maximo" value="{{old('voltaje_max', $detalle->voltaje_max ?? '')}}" required step="0.01" max="99" min="0" pattern="^\d*(\.\d{0,2})?$"/>
    </div>
    <label for="voltaje" class="col-sm-3 col-form-label requerido text-left">Voltaje Mínimo</label>
    <div class="col-sm-3">
      <input type="number" data-toggle="tooltip" title="Ingrese el Voltaje Mínimo" class="form-control limites" name="voltaje_min" id="voltaje_min" placeholder="Mínimo" value="{{old('voltaje_min', $detalle->voltaje_min ?? '')}}" required step="0.01" max="99" min="0" pattern="^\d*(\.\d{0,2})?$"/>
    </div>
  </div>  
  <div class="form-group row">
    <label for="temperatura" class="col-sm-3 col-form-label requerido text-left">Corriente Máxima</label>
    <div class="col-sm-3">
      <input type="number" data-toggle="tooltip" title="Ingrese la Corriente Máxima" class="form-control limites" name="corriente_max" id="corriente_max" placeholder="Maximo" value="{{old('corriente_max', $detalle->corriente_max ?? '')}}" required step="0.01" max="999" min="-999" pattern="^\d*(\.\d{0,2})?$"/>
    </div>
    <label for="temperatura" class="col-sm-3 col-form-label requerido text-left">Corriente Mínima</label>
    <div class="col-sm-3">
      <input type="number" data-toggle="tooltip" title="Ingrese la Corriente Mínima" class="form-control limites" name="corriente_min" id="corriente_min" placeholder="Mínimo" value="{{old('corriente_min', $detalle->corriente_min ?? '')}}" required step="0.01" max="999" min="-999" pattern="^\d*(\.\d{0,2})?$"/>
    </div>
  </div>  
  <div class="form-group row">
    <label for="temperatura" class="col-sm-3 col-form-label requerido text-left">Temperatura Máxima</label>
    <div class="col-sm-3">
      <input type="number" data-toggle="tooltip" title="Ingrese la Temperatura Máxima" class="form-control limites" name="temperatura_max" id="temperatura_max" placeholder="Maximo" value="{{old('temperatura_max', $detalle->temperatura_max ?? '')}}" required step="0.01" max="99" min="0" pattern="^\d*(\.\d{0,2})?$"/>
    </div>
    <label for="temperatura" class="col-sm-3 col-form-label requerido text-left">Temperatura Mínima</label>
    <div class="col-sm-3">
      <input type="number" data-toggle="tooltip" title="Ingrese la Temperatura Mínima" class="form-control limites" name="temperatura_min" id="temperatura_min" placeholder="Mínimo" value="{{old('temperatura_min', $detalle->temperatura_min ?? '')}}" required step="0.01" max="99" min="0" pattern="^\d*(\.\d{0,2})?$"/>
    </div>
  </div>
</div>

@section('scripts')
  <script>
    $(document).ready(function(){
      const tipo_dispositivo = $('#tipo_dispositivo').val();
      mostrar_variables(tipo_dispositivo);
    });

    $(document).on('change', '#tipo_dispositivo', function(){
      const tipo_dispositivo = $(this).val();      
      mostrar_variables(tipo_dispositivo);
    });

    $('#maestro_id').select({
        placeholder: 'Seleccione un maestro'
    });

    function mostrar_variables(item){
      console.log(item);
      if(item == 1){
        $('#dispositivo_maestro').css('display', 'none');
        $('#maestro_id').attr('required', false);
        $('#detalle').css('display', 'block');
        $('.limites').attr('required', true);
      } 
      else if(item == 2) {
        $('#detalle').css('display', 'none');
        $('.limites').attr('required', false);        
        $('#dispositivo_maestro').css('display', 'block');
        $('#maestro_id').attr('required', true);
      }
    }
  </script>
@endsection