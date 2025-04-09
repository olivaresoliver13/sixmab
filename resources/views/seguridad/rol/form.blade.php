<div class="form-group row">
  <label for="name" class="col-sm-2 requerido col-form-label text-left">{{ __('adminlte::adminlte.name') }}</label>
  <div class="col-xs-2 col-sm-10">
    <input type="text" title="Ingrese el nombre del rol" class="form-control tooltipsC" name="name" id="name" placeholder="Nombre" value="{{old('name', $data->name ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="slug" class="col-sm-2 requerido col-form-label text-left">{{ __('adminlte::adminlte.slug') }}</label>
  <div class="col-xs-2 col-sm-10">
    <input type="text" title="Ingrese el slug del rol" class="form-control tooltipsC" name="slug" id="slug" placeholder="Slug" value="{{old('slug', $data->slug ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="description" class="col-sm-2 requerido col-form-label text-left">{{ __('adminlte::adminlte.description') }}</label>
  <div class="col-xs-2 col-sm-10">
    <textarea data-toggle="tooltip" name="description" id="description" class="form-control" rows="1" id="comment" title="Ingrese la descripción del rol" placeholder="Descripción" minlength="1" maxlength="500" required>{{old('description', $data->description ?? '')}}</textarea>
  </div>
</div>
<div class="form-group row">
  <div class="col-xs-2 col-sm-10">
    <input type="radio" name="special" data-toggle="tooltip" title="Seleccione una Opción" value="Acceso total" {{ 'Acceso total' == old('special', $data->special ?? '') ? 'checked' : '' }}>&nbsp; Acceso Total &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="special" data-toggle="tooltip" title="Seleccione una Opción" value="Sin acceso" {{ 'Sin acceso' == old('special', $data->special ?? '') ? 'checked' : '' }}>&nbsp; Ningún Acceso &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" name="special" data-toggle="tooltip" title="Seleccione una Opción" value="" {{ '' == old('special', $data->special ?? '') ? 'checked' : '' }}>&nbsp; various permissions &nbsp;&nbsp;&nbsp;&nbsp;
  </div>
</div>