<div class="form-group row">
  <label for="titulo" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.Title') }}</label>
  <div class="col-sm-9">
    <input type="text" data-toggle="tooltip" title="Ingrese un Titulo para la Noticia" placeholder="Titulo" class="form-control" name="titulo" id="titulo" value="{{ old('titulo', $data->titulo ?? '') }}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="entradilla" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.Entradilla') }}</label>
  <div class="col-sm-9">
    <textarea class="form-control" data-toggle="tooltip" name="entradilla" id="entradilla" rows="1" title="Ingrese una entradilla para la Noticia" placeholder="Entradilla" minlength="1" maxlength="500" required>{{ old('entradilla', $data->entradilla ?? '') }}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="texto1" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.First-paragraph') }}</label>
  <div class="col-sm-9">
    <textarea class="form-control" data-toggle="tooltip" name="texto1" id="texto1" rows="1" title="Ingrese el primer párrafo para la Noticia" placeholder="Primer párrafo de la Noticia" minlength="1" maxlength="500" required>{{ old('texto1', $data->texto1 ?? '') }}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="texto2" class="col-sm-3 col-form-label text-left">{{ __('adminlte::adminlte.Second-paragraph') }}</label>
  <div class="col-sm-9">
    <textarea class="form-control" data-toggle="tooltip" name="texto2" id="texto2" rows="1" title="Ingrese el segundo párrafo para la Noticia" placeholder="Segundo párrafo de la Noticia" minlength="1" maxlength="500">{{ old('texto2', $data->texto2 ?? '') }}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="texto3" class="col-sm-3 col-form-label text-left">{{ __('adminlte::adminlte.Third-paragraph') }}</label>
  <div class="col-sm-9">
    <textarea class="form-control" data-toggle="tooltip" name="texto3" id="texto3" rows="1" title="Ingrese el tercer párrafo para la Noticia" placeholder="Tercer párrafo de la Noticia" minlength="1" maxlength="500">{{ old('texto3', $data->texto3 ?? '') }}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="texto4" class="col-sm-3 col-form-label text-left">{{ __('adminlte::adminlte.Fourth-paragraph') }}</label>
  <div class="col-sm-9">
    <textarea class="form-control" data-toggle="tooltip" name="texto4" id="texto4" rows="1" title="Ingrese el cuarto párrafo para la Noticia" placeholder="Cuarto párrafo de la Noticia" minlength="1" maxlength="500">{{ old('texto4', $data->texto4 ?? '') }}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="texto5" class="col-sm-3 col-form-label text-left">{{ __('adminlte::adminlte.Fifth-paragraph') }}</label>
  <div class="col-sm-9">
    <textarea class="form-control" data-toggle="tooltip" name="texto5" id="texto5" rows="1" title="Ingrese el quinto párrafo para la Noticia" placeholder="Quinto párrafo de la Noticia" minlength="1" maxlength="500">{{ old('texto5', $data->texto5 ?? '') }}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="autor" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.Author') }}</label>
  <div class="col-sm-9">
    <input type="autor" name="autor" id="autor" data-toggle="tooltip" placeholder="Autor" title="Ingrese un Autor" class="form-control" value="{{old('autor', $data->autor ?? '')}}" minlength="1" maxlength="64" required/>
  </div>
</div>
<div class="form-group row">
  <label for="link" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.Link') }}</label>
  <div class="col-sm-9">
    <input type="url" name="link" id="link" data-toggle="tooltip" title="Ingrese un Link" placeholder="Link" class="form-control" value="{{old('link', $data->link ?? '')}}" minlength="1" maxlength="64" required/>
  </div>
</div>
<div class="form-group row">
  <label for="Imagen" class="col-sm-3 col-form-label requerido text-left">{{ __('adminlte::adminlte.image') }}</label>
  <div class="col-sm-9">
    <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->foto) ? url("img/noticia/$data->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Imagen"}}" accept="image/*"/>
  </div>
</div>