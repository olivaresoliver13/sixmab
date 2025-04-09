@include('includes.verificar-campo')

<script>
  function showInp(){
    getSelectValue = document.getElementById("pais").value;
    
    switch (getSelectValue){
      case "1": 
        document.getElementById("rut").style.display = "inline-block";
        document.getElementById("rut").required = true;
        document.getElementById("rut").setAttribute("name", "identificador");
        document.getElementById("otro").style.display = "none";
        document.getElementById("otro").required = false;
        document.getElementById("otro").setAttribute("name", "");
        document.getElementById("telefono1").style.display = "inline-block";
        document.getElementById("telefono1").required = true;
        document.getElementById("telefono1").setAttribute("name", "telefono1");
        document.getElementById("telefono11").style.display = "none";
        document.getElementById("telefono11").required = false;
        document.getElementById("telefono11").setAttribute("name", "");
        document.getElementById("telefono2").style.display = "inline-block";
        document.getElementById("telefono2").setAttribute("name", "telefono2");
        document.getElementById("telefono22").style.display = "none";
        document.getElementById("telefono22").setAttribute("name", "");
      break;      
      default: 
        document.getElementById("otro").style.display = "inline-block";
        document.getElementById("otro").required = true;
        document.getElementById("otro").setAttribute("name", "identificador");
        document.getElementById("rut").style.display = "none";
        document.getElementById("rut").required = false;
        document.getElementById("rut").setAttribute("name", "");
        document.getElementById("telefono11").style.display = "inline-block";
        document.getElementById("telefono11").required = true;
        document.getElementById("telefono11").setAttribute("name", "telefono1");
        document.getElementById("telefono1").style.display = "none";
        document.getElementById("telefono1").required = false;
        document.getElementById("telefono1").setAttribute("name", "");
        document.getElementById("telefono22").style.display = "inline-block";
        document.getElementById("telefono22").setAttribute("name", "telefono2");
        document.getElementById("telefono2").style.display = "none";
        document.getElementById("telefono2").setAttribute("name", "");
      break;
    }
  }
</script>

<script>
  $("#pais").change(function(event) {
    if($(this)[0].selectedIndex==0) {
      $(this).prop('required',true);
    }
  });
</script>

<div class="form-group row">
  <label for="nombre" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.name') }}</label>
  <div class="col-sm-10">
    <input type="text" data-toggle="tooltip" title="Ingrese el Nombre de la Planta" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="{{old('nombre', $data->nombre ?? '')}}" minlength="1" maxlength="100" required/>
  </div>
</div>
<div class="form-group row">
  <label for="siglas" class="col-sm-2 col-form-label requerido text-left">Siglas</label>
  <div class="col-sm-4">
    <input type="text" data-toggle="tooltip" title="Ingrese las Siglas de la Planta" class="form-control" name="siglas" id="siglas" placeholder="siglas" value="{{old('siglas', $data->siglas ?? '')}}" minlength="1" maxlength="15" required/>
  </div>
  <label for="email" class="col-sm-2 requerido col-form-label text-left">{{ __('adminlte::adminlte.email') }}</label>
  <div class="col-sm-4">
    <input type="email" data-toggle="tooltip" title="Ingrese un Correo Electrónico" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email', $data->email ?? '')}}" minlength="1" maxlength="50" required/>
  </div>
</div>
<div class="form-group row">
  <label for="direccion" class="col-sm-2 col-form-label requerido text-left">{{ __('adminlte::adminlte.address') }}</label>
  <div class="col-sm-10">
    <textarea data-toggle="tooltip" name="direccion" id="direccion" class="form-control" rows="1" id="comment" title="Ingrese la Dirección de la Planta" placeholder="Dirección" minlength="1" maxlength="50" required>{{old('direccion', $data->direccion ?? '')}}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="pais" class="col-sm-2 requerido col-form-label text-left">País</label>
  <div class="col-sm-4">
    <select class="selectpicker form-control" data-style="bg-white" data-live-search="true" title="Seleccione un País" name="pais_id" id="pais" onchange="showInp()" required>
      <option value="" disabled>Elige una opción</option>
      @foreach ($paises as $item)
        @if (isset($data->pais_id))
          @if ($data->pais_id == $item->id)
            <option value="{{$item->id}}">{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}">{{$item->nombre}}</option>
          @endif
        @else
          <option value="{{$item->id}}" >{{$item->nombre}}</option>
        @endif      
      @endforeach
    </select>
  </div>
  <label for="paises" id="label_pais" class="col-sm-2 col-form-label text-left"></label>
  <div class="col-sm-4">
    <input type="text" data-toggle="tooltip" value="{{old('identificador', $data->identificador ?? '')}}" title="Ingrese el Rut de la Empresa" class="form-control rut" name="" style="display:none;" id="rut" placeholder="Rut" minlength="12" maxlength="12" pattern="[0-9.-]{12}"/>
    <input type="text" data-toggle="tooltip" value="{{old('identificador', $data->identificador ?? '')}}" title="Ingrese el Identificador de la Empresa" class="form-control" name="" style="display:none;" id="otro" placeholder="Identificador" minlength="1" maxlength="12"/>
  </div>
</div>
<div class="form-group row">
  <label for="paises" id="label_telefono1" class="col-sm-2 col-form-label text-left"></label>  
  <div class="col-sm-4">
    <input type="text" data-toggle="tooltip" value="{{old('telefono1', $data->telefono1 ?? '')}}" title="Ingrese un Número Telefónico" class="form-control phone" name="" style="display:none;" id="telefono1" placeholder="Teléfono 1" minlength="15" maxlength="15" pattern="[0-9+ ]{15}"/>
    <input type="text" data-toggle="tooltip" value="{{old('telefono1', $data->telefono1 ?? '')}}" title="Ingrese un Número Telefónico" class="form-control" name="" style="display:none;" id="telefono11" placeholder="Teléfono 1" minlength="1" maxlength="15"/>
  </div>
  <label for="paises" id="label_telefono2" class="col-sm-2 col-form-label text-left"></label>
  <div class="col-sm-4">
    <input type="text" data-toggle="tooltip" value="{{old('telefono2', $data->telefono2 ?? '')}}" title="Ingrese un Segundo Número Telefónico (Opcional)" class="form-control phone" name="" style="display:none;" id="telefono2" placeholder="Teléfono 2" minlength="15" maxlength="15" pattern="[0-9+ ]{15}"/>
    <input type="text" data-toggle="tooltip" value="{{old('telefono2', $data->telefono2 ?? '')}}" title="Ingrese un Segundo Número Telefónico (Opcional)" class="form-control" name="" style="display:none;" id="telefono22" placeholder="Teléfono 2" minlength="1" maxlength="15"/>
  </div>
</div>

@section('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endsection

@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <script>
    $.fn.selectpicker.Constructor.BootstrapVersion = '4';

    $(document).on('change', '#pais', function(){

      const pais = $(this).val();
      
      if(pais == 1){
        $('#label_pais').text('Rut');
        $('#label_telefono1').text('Telefono 1');
        $('#label_telefono2').text('Telefono 2');
      } else{
        $('#label_pais').text('Identificador');
        $('#label_telefono1').text('Telefono 1');
        $('#label_telefono2').text('Telefono 2');
      }
      $('#paises').css('display', 'block');
    });
  </script>
@endsection