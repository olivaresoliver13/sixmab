<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

<div class="form-group row">
  <label for="name" class="col-sm-2 col-xs-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.name') }}</label>
  <div class="col-xs-2 col-sm-10">
    <input type="text" data-toggle="tooltip" title="Ingrese un nombre de usuario" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Nombre" value="{{old('name', $data->name ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="email" class="col-sm-2 col-xs-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.email') }}</label>
  <div class="col-xs-2 col-sm-5">
    <input type="email" data-toggle="tooltip" title="Ingrese un correo electrónico" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Email"  value="{{old('email', $data->email ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
  @if ($errors->has('email'))
    <div class="invalid-feedback">
      <strong>{{ $errors->first('email') }}</strong>
    </div>
  @endif
    <div class="col-xs-2 col-sm-5">
      <input type="email" data-toggle="tooltip" title="Ingrese nuevamente el correo para su verificación" class="form-control {{ $errors->has('email_confirmation') ? 'is-invalid' : '' }}" name="email_confirmation" id="email_confirmation" placeholder="Confirmar el Email" value="{{old('email_confirmation', $data->email ?? '')}}" required/>
      @if ($errors->has('email_confirmation'))
      <div class="invalid-feedback">
        <strong>{{ $errors->first('email_confirmation') }}</strong>
      </div>
    </div>
  @endif    
  </div>
</div>
@if (!isset($data))
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-xs-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.password') }}</label>
    <div class="col-xs-2 col-sm-5">
      <input type="password" data-toggle="tooltip" title="Ingrese una contraseña mínimo 8 caracteres con un máximo de 20 caracteres" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="password" placeholder="Contraseña" value="" minlength="8" maxlength="20" {{!isset($data) ? 'required' : ''}}/>
    </div>
    @if ($errors->has('password'))
      <div class="invalid-feedback">
        <strong>{{ $errors->first('password') }}</strong>
      </div>
    @endif
      <div class="col-xs-2 col-sm-5">
        <input type="password" data-toggle="tooltip" title="Ingrese nuevamente la contraseña para su verificación" class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" name="password_confirmation" name="password_confirmation" id="password_confirmation" value="" placeholder="Confirmar la Contraseña" {{!isset($data) ? 'required' : ''}} />
        @if ($errors->has('password_confirmation'))
        <div class="invalid-feedback">
          <strong>{{ $errors->first('password_confirmation') }}</strong>
        </div>
      </div>
    @endif    
    </div>
  </div>  
@endif
<div class="form-group row">
  <label for="status" id="status" class="col-sm-2 col-form-label text-left requerido">Estado</label>  
  <div class="col-xs-2 col-sm-5">
    <input type="radio" data-toggle="tooltip" title="Seleccione una Opción" name="status" value="1" {{ 1 == old('status', $data->status ?? '') ? 'checked' : '' }}>&nbsp; Activo &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" data-toggle="tooltip" title="Seleccione una Opción" name="status" value="0" {{ 0 == old('status', $data->status ?? '') ? 'checked' : '' }}>&nbsp; Inactivo 
  </div>
  <label for="privilege" id="privilege" class="col-sm-2 col-form-label text-left requerido">Privilegio</label>
  <div class="col-xs-2 col-sm-3">
    <input type="radio" data-toggle="tooltip" title="Seleccione una Opción" name="privilege" value="1" {{ 1 == old('privilege', $data->privilege ?? '') ? 'checked' : '' }}>&nbsp; Activo &nbsp;&nbsp;&nbsp;&nbsp;
    <input type="radio" data-toggle="tooltip" title="Seleccione una Opción" name="privilege" value="0" {{ 0 == old('privilege', $data->privilege ?? '') ? 'checked' : '' }}>&nbsp; Inactivo 
  </div>
</div>

<div class="form-group row">
  <label for="role_id" class="col-sm-2 col-form-label text-left requerido">Rol</label>
  <div class="col-xs-2 col-sm-10">
    <select class="selectpicker form-control" multiple data-actions-box="true" data-selected-text-format="count > 4" data-style="bg-white" data-live-search="true" title="Seleccione un Rol" name="role_id[]" id="role_id">
      @foreach($rols as $id => $name)
        <option
        value="{{$id}}"
        {{is_array(old('role_id')) ? (in_array($id, old('role_id')) ? 'selected' : '')  : (isset($data) ? ($data->roles->firstWhere('id', $id) ? 'selected' : '') : '')}}
        >
        {{$name}}
        </option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="empresa_id" class="col-sm-2 col-form-label text-left requerido">Empresa</label>
  <div class="col-xs-2 col-sm-10">
    <select class="selectpicker form-control" multiple data-actions-box="true" data-selected-text-format="count > 4" data-style="bg-white" data-live-search="true" title="Seleccione una Empresa" name="empresa_id[]" id="empresa_id">
      @foreach($empresa as $id => $nombre)
        <option
        value="{{$id}}"
        {{is_array(old('empresa_id')) ? (in_array($id, old('empresa_id')) ? 'selected' : '')  : (isset($data) ? ($data->empresas->firstWhere('id', $id) ? 'selected' : '') : '')}}
        >
        {{$nombre}}
        </option>
      @endforeach
    </select>
  </div>
</div>

<div class="form-group row">
  <label for="Imagen" class="col-sm-2 col-form-label text-left">{{ __('adminlte::adminlte.image') }}</label>
  <div class="col-sm-10">
    <input type="file" name="foto_up" id="foto" data-initial-preview="{{isset($data->foto) ? url("img/usuario/$data->foto") : "http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=Imagen"}}" accept="image/*"/>
  </div>
</div>