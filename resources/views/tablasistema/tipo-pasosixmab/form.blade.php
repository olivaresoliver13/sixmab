<div class="form-group row">
  <label for="nombre" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.name') }}</label>
  <div class="col-sm-9">
    <input type="text" data-toggle="tooltip" title="Ingrese el nombre del tipo de paso SIXMAB" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{old('nombre', $data->nombre ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="descripcion" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.description') }}</label>
  <div class="col-sm-9">
    <textarea data-toggle="tooltip" name="descripcion" id="descripcion" class="form-control" rows="1" id="comment" title="Ingrese la descripción del tipo de paso SIXMAB" placeholder="Descripción" minlength="1" maxlength="500" required>{{old('descripcion', $data->descripcion ?? '')}}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="orden" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.order') }}</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese el orden del tipo de paso SIXMAB" class="form-control" name="orden" minlength="1" maxlength="10" id="orden" placeholder="orden" value="{{old('orden', $data->orden ?? '')}}" required/>
  </div>
</div>
<div class="form-group row">
  <label for="Imagen" class="col-sm-3 col-form-label text-left">{{ __('adminlte::adminlte.image') }}</label>
  <div class="col-sm-9">
    <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->foto) ? url("img/pasosixmab/$data->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Imagen"}}" accept="image/*"/>
  </div>
</div>