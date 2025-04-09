<div class="form-group row">
  <label for="nombre" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.name') }}</label>
  <div class="col-sm-9">
    <input type="text" data-toggle="tooltip" title="Ingrese el nombre de la composición química" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{old('nombre', $data->nombre ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>