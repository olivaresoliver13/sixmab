<script>
  $("#tipo_maquinaria").change(function(event) {
    if($(this)[0].selectedIndex==0) {
      $(this).prop('required',true);
    }
  });
</script>

<div class="form-group row">
    <label for="codigo" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.code') }}</label>
    <div class="col-sm-9">
      <input type="text" data-toggle="tooltip" title="Ingrese un codigo para el tipo de sistema" class="form-control" name="codigo" id="codigo" placeholder="Codigo" value="{{old('codigo', $data->codigo ?? '')}}" minlength="1" maxlength="100" required/>
    </div>
</div>
<div class="form-group row">
  <label for="siglas" class="col-sm-3 col-form-label requerido text-left">Siglas</label>
  <div class="col-sm-9">
    <input type="text" data-toggle="tooltip" title="Ingrese las siglas de la empresa" class="form-control" name="siglas" id="siglas" placeholder="siglas" value="{{old('siglas', $data->siglas ?? '')}}" minlength="1" maxlength="15" required/>
  </div>
</div>
<div class="form-group row">
  <label for="tipo_maquinaria" class="col-sm-3 requerido col-form-label text-left">{{ __('adminlte::adminlte.type-system') }}</label>
  <div class="col-sm-9">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Seleccione un tipo de Maquinaria" name="tipo_maquinaria_id" id="tipo_maquinaria" required>
      @foreach ($tipos_maquinaria as $item)        
        @if (isset($data->tipo_maquinaria_id))
          @if ($data->tipo_maquinaria_id == $item->id)
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

@isset($data)    
  <div class="form-group row">
    <label for="maquinaria_id" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.plant') }}</label>
    <div class="col-sm-10">
      <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Seleccione una Planta" name="planta_id" id="planta_id" required>
        @foreach ($plantas as $planta)
          <option value="{{$planta->id}}" {{$data->planta_id == $planta->id ? 'selected' : ''}}>{{$planta->nombre}}</option>
        @endforeach
      </select>
    </div>
  </div>
@endisset

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection