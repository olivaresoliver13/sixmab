<script>
  function showInp(){
    var getSelectValue = document.getElementById("tipo_bateria").value;
    
    switch (getSelectValue) {
      case "1": 
        document.getElementById("arranque").style.display = "inline-block";
        document.getElementById("arranque").required = true;
        document.getElementById("arranque").setAttribute("name", "cca_o_impedancia");
        document.getElementById("traccion").style.display = "none";
        document.getElementById("traccion").setAttribute("name", "");
        document.getElementById("traccion").required = false;
        document.getElementById("ciclo").style.display = "none";
        document.getElementById("ciclo").setAttribute("name", "");
        document.getElementById("ciclo").required = false;
        break;
        
      case "2":
        document.getElementById("arranque").style.display = "none";
        document.getElementById("arranque").setAttribute("name", "");
        document.getElementById("arranque").required = false;
        document.getElementById("traccion").style.display = "inline-block";
        document.getElementById("traccion").required = false;
        document.getElementById("traccion").setAttribute("name", "cca_o_impedancia");
        document.getElementById("ciclo").style.display = "none";
        document.getElementById("ciclo").setAttribute("name", "");
        document.getElementById("ciclo").required = false;
        break;
        
      case "3":
        document.getElementById("arranque").style.display = "none";
        document.getElementById("arranque").setAttribute("name", "");
        document.getElementById("arranque").required = false;
        document.getElementById("traccion").style.display = "none";
        document.getElementById("traccion").setAttribute("name", "");
        document.getElementById("traccion").required = false;
        document.getElementById("ciclo").style.display = "inline-block";
        document.getElementById("ciclo").required = true;
        document.getElementById("ciclo").setAttribute("name", "cca_o_impedancia");
        break;
    }
  }
</script>

<script>
  $("#tipo_bateria").change(function(event) {
    if($(this)[0].selectedIndex==0) {
      $(this).prop('required',true);
    }
  });

  $("#dispositivo_id").change(function(event) {
    if($(this)[0].selectedIndex==0) {
      $(this).prop('required',true);
    }
  });
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<div class="form-group row">
    <label for="codigo" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.battery-number') }}</label>
    <div class="col-sm-9">
      <input type="text" data-toggle="tooltip" title="Ingrese el Número de Batería" class="form-control" name="numero_bateria" id="numero_bateria" placeholder="Número Batería" value="{{old('numero_bateria', $data->numero_bateria ?? '')}}" minlength="1" maxlength="100" required/>
    </div>
</div>
<div class="form-group row">
  <label for="siglas" class="col-sm-3 col-form-label requerido text-left">Siglas</label>
  <div class="col-sm-9">
    <input type="text" data-toggle="tooltip" title="Ingrese las siglas de la Bateía" class="form-control" name="siglas" id="siglas" placeholder="Siglas" value="{{old('siglas', $data->siglas ?? '')}}" minlength="1" maxlength="15" required/>
  </div>
</div>
<div class="form-group row">
  <label for="tipos_bateria" class="col-sm-3 requerido col-form-label text-left">{{ __('adminlte::adminlte.type-battery') }}</label>
  <div class="col-sm-3">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Tipo Batería" name="tipo_bateria_id" id="tipo_bateria" onchange="showInp()" required>
      <option value="" disabled>Elige una opción</option>
      @foreach ($tipos_bateria as $item)
          @if (isset($data->tipo_bateria_id))
            @if ($data->tipo_bateria_id == $item->id)
              <option value="{{$item->id}}">{{$item->nombre}}</option>
            @else
              <option value="{{$item->id}}">{{$item->nombre}}</option>
            @endif
          @else
            <option value="{{$item->id}}">{{$item->nombre}}</option>
          @endif      
        @endforeach
    </select>
  </div>{{$item->tipo_bateria_id}}
  <label for="cca_o_impedancia" id="label_cca_o_impedancia" class="col-sm-2 col-form-label"></label>
  <div class="col-sm-4">
    <input style="display: none" id="arranque" type="number" data-toggle="tooltip" title="Ingrese el CCA" class="form-control" placeholder="CCA" value="{{old('cca_o_impedancia', $data->cca_o_impedancia ?? '')}}" step="0.01" pattern="^\d*(\.\d{0,2})?$" minlength="1" maxlength="8"/>
    <input style="display: none" id="ciclo"  type="number" data-toggle="tooltip" title="Ingrese la Impedancia" class="form-control" placeholder="Impedancia" value="{{old('cca_o_impedancia', $data->cca_o_impedancia ?? '')}}" step="0.01" pattern="^\d*(\.\d{0,2})?$" minlength="1" maxlength="8"/>
    <input style="display: none" id="traccion"  type="hidden" class="form-control"/>
  </div>
</div>
<div class="form-group row">
  <label for="tipo_paso_sixmab" class="col-sm-3 col-form-label text-left">{{ __('adminlte::adminlte.steps') }}</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" multiple data-actions-box="true" data-selected-text-format="count > 4" data-style="bg-white" data-live-search="true" title="Seleccione Pasos SIXMAB" name="tipos_paso_sixmab[]" id="tipo_paso_sixmab">
      @foreach ($tipos_paso_sixmab as $paso_sixmab)
        @isset($data)
          <option value="{{$paso_sixmab->tipo_paso_sixmab_id}}" {{$pasos_empresa->contains('tipo_paso_sixmab_id', $paso_sixmab->tipo_paso_sixmab_id) ? 'selected' : ''}}>{{$paso_sixmab->tipo_paso_sixmab->nombre}}</option> 
        @else
          <option value="{{$paso_sixmab->tipo_paso_sixmab_id}}">{{$paso_sixmab->tipo_paso_sixmab->nombre}}</option>
        @endisset
      @endforeach
    </select>
  </div>
</div>
<div class="form-group row">
  <label for="composicion_quimica" class="col-sm-3 requerido col-form-label text-left">{{ __('adminlte::adminlte.chemical-composition') }}</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Composición Química" name="composicion_quimica_id" id="composicion_quimica_id" required>  
    @foreach ($composicion_quimica as $item)
        @if (isset($data->composicion_quimica_id))
          @if ($data->composicion_quimica_id == $item->id)
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
  <label for="marca" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.brand') }}</label>
  <div class="col-sm-3">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="marca" name="marca_id" id="marca" onchange="showInp()" required >  
      <option value="" selected>Elige una opción</option>
      @foreach ($marca as $item)
          @if (isset($data->marca_id))
            @if ($data->marca_id == $item->id)
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
  <label for="modelo" class="col-sm-2 col-form-label">{{ __('adminlte::adminlte.model') }}</label>
  <div class="col-sm-4">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="modelo" name="modelo_id" id="modelo" onchange="showInp()" required >  
      <option value="" selected>Elige una opción</option>
      @foreach ($modelo as $item)
          @if (isset($data->modelo_id))
            @if ($data->modelo_id == $item->id)
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
  <label for="codigo" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.mominal-measures') }}</label>
  <div class="col-sm-3">
    <input type="number" min="1" data-toggle="tooltip" title="Ingrese la medida nominal" class="form-control" name="voltaje_nominal" id="voltaje_nominal" placeholder="Voltaje" value="{{old('voltaje_nominal', $data->voltaje_nominal ?? '')}}" minlength="1" maxlength="6" required step="0.01" pattern="^\d*(\.\d{0,2})?$"/>
  </div>
  <div class="col-sm-3">
    <input type="number" min="1" data-toggle="tooltip" title="Ingrese la capacidad nominal" class="form-control" name="capacidad_nominal" id="capacidad_nominal" placeholder="Capacidad" value="{{old('capacidad_nominal', $data->capacidad_nominal ?? '')}}" minlength="1" maxlength="8" required step="0.01" pattern="^\d*(\.\d{0,2})?$"/>
  </div>
  <div class="col-sm-3">
    <input type="number" min="1" data-toggle="tooltip" title="Ingrese la descarga nominal" class="form-control" name="descarga_nominal" id="descarga_nominal" placeholder="Descarga" value="{{old('descarga_nominal', $data->descarga_nominal ?? '')}}" minlength="1" maxlength="8" required step="0.01" pattern="^\d*(\.\d{0,2})?$"/>
  </div>
</div>
<div class="form-group row">
  <label for="cantidad_temperatura" class="col-sm-3 col-form-label requerido text-left">Cantidad de Temperatura</label>
  <div class="col-sm-3">
    <input type="number" data-toggle="tooltip" title="Ingrese la cantidad de temperatura a medir" class="form-control" name="cantidad_temperatura" id="cantidad_temperatura" placeholder="Cantidad de Temperatura" value="{{old('cantidad_temperatura', $data->cantidad_temperatura ?? '')}}" min="1" max="10" required/>
  </div>
  <label for="cantidad_celda" class="col-sm-3 requerido col-form-label">Cantidad de Celdas</label>
  <div class="col-sm-3">
    <div class="col-sm-15">
      <input type="number" data-toggle="tooltip" title="Ingrese la cantidad a medir" class="form-control" name="cantidad_celda" id="cantidad_celda" placeholder="Cantidad de Celdas" value="{{old('cantidad_celda', $data->cantidad_celda ?? '')}}" min="1" max="24" required />
    </div>
  </div>
</div>
<div class="form-group row">
  <label for="codigo" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.serial-number') }}</label>
  <div class="col-sm-3">
    <input type="text" data-toggle="tooltip" title="Ingrese el numero de serie" class="form-control" name="numero_serie" id="numero_serie" placeholder="Número de serie" value="{{old('numero_serie', $data->numero_serie ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
  <label for="codigo" class="col-sm-2 col-form-label">Dispositivo</label>
  <div class="col-sm-4">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Dispositivo" name="dispositivo_id" id="tipo_bateria" onchange="showInp()" required >  
      <option value="" selected>Elige una opción</option>
      @foreach ($dispositivo as $item)
          @if (isset($data->dispositivo_id))
            @if ($data->dispositivo_id == $item->id)
              <option value="{{$item->id}}" selected>{{$item->identificador}}</option>
            @else
              <option value="{{$item->id}}" >{{$item->identificador}}</option>
            @endif
          @else
            <option value="{{$item->id}}" >{{$item->identificador}}</option>
          @endif      
        @endforeach
    </select>
  </div>
</div>

@isset($data)    
  <div class="form-group row">
    <label for="maquinaria_id" class="col-sm-3 requerido col-form-label text-left">{{ __('adminlte::adminlte.machinery') }}</label>
    <div class="col-sm-9">
      <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Seleccione maquinaria" name="maquinaria_id" id="maquinaria_id" required>
        @foreach ($plantas as $planta)
          <optgroup class="text-left" label="{{$planta->nombre}}">
            @foreach ($planta->maquinarias as $maquinaria)
              <option value="{{$maquinaria->id}}"  {{$data->maquinaria_id == $maquinaria->id ? 'selected' : ''}}>{{$maquinaria->codigo}}</option>        
            @endforeach
          </optgroup>
        @endforeach        
      </select>
    </div>
  </div>
@endisset

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
@endsection