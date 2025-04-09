<div class="form-group row">
  <label for="nombre" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.name') }}</label>
  <div class="col-sm-9">
    <input type="text" data-toggle="tooltip" title="Ingrese el nombre del tipo de maquinaria" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{old('nombre', $data->nombre ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="icono" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.icon') }}</label>
  <div class="col-sm-9">
    <input type="text" data-toggle="tooltip" title="Ingrese el icono del tipo de maquinaria" class="form-control" name="icono" id="icono" placeholder="Icono" value="{{old('icono', $data->icono ?? '')}}" minlength="1" maxlength="50" required/>
    <span style="position: relative; float: right; right: 8px; bottom: 25.6px; color: #326837;" id="mostrar-icono" class="{{old('icono', $data->icono ?? '')}}"></span>  
  </div>
</div>