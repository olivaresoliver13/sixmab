<div class="form-group row">
  <label for="name" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.name') }}</label>
  <div class="col-sm-10">
    <input type="text" data-toggle="tooltip" title="Ingrese el nombre del permiso" class="form-control" name="name" id="name" placeholder="Nombre" value="{{old('name', $data->name ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="slug" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.slug') }}</label>
  <div class="col-sm-10">
    <input type="text" data-toggle="tooltip" title="Ingrese el slug del permiso" class="form-control" name="slug" id="slug" placeholder="Slug" value="{{old('slug', $data->slug ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="description" class="col-sm-2 requerido col-form-label text-left">{{ __('adminlte::adminlte.description') }}</label>
  <div class="col-xs-2 col-sm-10">
    <textarea data-toggle="tooltip" name="description" id="description" class="form-control" rows="1" id="comment" title="Ingrese la descripción del permiso" placeholder="Descripción" minlength="1" maxlength="500" required>{{old('description', $data->description ?? '')}}</textarea>
  </div>
</div>