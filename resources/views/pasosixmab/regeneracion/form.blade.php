<hr>
  <h6>Mediciones en Carga por Batería</h6>
<hr>
<div class="form-group row">
  <label for="gravedad_especifica" class="col-sm-3 col-form-label requerido text-left">Gravedad Especifica</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese la Gravedad Especifica" class="form-control" name="gravedad_especifica" id="gravedad_especifica" placeholder="Gravedad Especifica" value="{{old('gravedad_especifica', $data->gravedad_especifica ?? '')}}" pattern="[0-9]" min="0" max="80" required />
  </div>
</div>
<div class="form-group row">
  <label for="voltaje" class="col-sm-3 col-form-label requerido text-left">Voltaje</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese el Voltaje" class="form-control" name="voltaje" id="voltaje" placeholder="Voltaje" value="{{old('voltaje', $data->voltaje ?? '')}}" pattern="[0-9]" min="0" max="120" required />
  </div>
</div>
<div class="form-group row">
  <label for="temperatura" class="col-sm-3 col-form-label requerido text-left">Temperatura</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese la Temperatura" class="form-control" name="temperatura" id="temperatura" placeholder="Temperatura" value="{{old('temperatura', $data->temperatura ?? '')}}" pattern="[0-9]" min="-10" max="50" required />
  </div>
</div>
<div class="form-group row">
  <label for="corriente_ac_dc" class="col-sm-3 col-form-label requerido text-left">Corriente AC/DC</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese la Corriente AC/DC" class="form-control" name="corriente_ac_dc" id="corriente_ac_dc" placeholder="Corriente AC/DC" value="{{old('corriente_ac_dc', $data->corriente_ac_dc ?? '')}}" pattern="[0-9]" min="0" max="150" required />
  </div>
</div>
<hr>
  <h6>Programa de Descarga</h6>
<hr>
<div class="form-group row">
  <label for="hora" class="col-sm-3 col-form-label requerido text-left">Hora</label>
  <div class="col-sm-9">
    <input type="time" data-toggle="tooltip" title="Ingrese la Hora" class="form-control" name="hora" id="hora" placeholder="Hora" value="{{old('hora', $data->hora ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="corriente" class="col-sm-3 col-form-label requerido text-left">Corriente</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese la Corriente" class="form-control" name="corriente" id="corriente" placeholder="Corriente" value="{{old('corriente', $data->corriente ?? '')}}" pattern="[0-9]" min="1" max="150" required />
  </div>
</div>
<div class="form-group row">
  <label for="voltaje_corte" class="col-sm-3 col-form-label requerido text-left">Voltaje de Corte</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese la Voltaje de Corte" class="form-control" name="voltaje_corte" id="voltaje_corte" placeholder="Voltaje de Corte" value="{{old('voltaje_corte', $data->voltaje_corte ?? '')}}" pattern="[0-9]" min="1" max="150" required />
  </div>
</div>
<hr>
  <h6>Datos Pre-Regeneración</h6>
<hr>
<div class="form-group row">
  <label for="tiempo_descarga" class="col-sm-3 col-form-label requerido text-left">Tiempo Descarga</label>
  <div class="col-sm-9">
    <input type="time" data-toggle="tooltip" title="Ingrese el Tiempo de Descarga" class="form-control" name="tiempo_descarga" id="tiempo_descarga" placeholder="Tiempo Descarga" value="{{old('tiempo_descarga', $data->tiempo_descarga ?? '')}}" required />
  </div>
</div>
<div class="form-group row">
  <label for="capacidad" class="col-sm-3 col-form-label requerido text-left">Capacidad</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese la Capacidad" class="form-control" name="capacidad" id="capacidad" placeholder="Capacidad" value="{{old('capacidad', $data->capacidad ?? '')}}" pattern="[0-9]" min="0" max="1000" required />
  </div>
</div>
<div class="form-group row">
  <label for="eficiencia" class="col-sm-3 col-form-label requerido text-left">Eficiencia</label>
  <div class="col-sm-9">
    <input type="number" data-toggle="tooltip" title="Ingrese la Eficiencia" class="form-control" name="eficiencia" id="eficiencia" placeholder="eficiencia" value="{{old('eficiencia', $data->eficiencia ?? '')}}" pattern="[0-9]" min="1" max="100" required />
  </div>
</div>
<hr>
<hr>
@if($bateria->tipo_bateria_id == 3)
  <div class="form-group row">
    <label for="cca_cold_cranking_ampere" class="col-sm-3 col-form-label requerido text-left">CCA - COLD CRANKING AMPERES</label>
    <div class="col-sm-9">
      <input type="number" data-toggle="tooltip" title="Ingrese el CCA - COLD CRANKING AMPERES" class="form-control" name="cca_cold_cranking_ampere" id="cca_cold_cranking_ampere" placeholder="cca_cold_cranking_ampere" value="{{old('cca_cold_cranking_ampere', $data->cca_cold_cranking_ampere ?? '')}}" pattern="[0-9]" min="1" max="1000" required />
    </div>
  </div>
@endif 
@if($bateria->tipo_bateria_id == 1)
  <div class="form-group row">
    <label for="impedancia" class="col-sm-3 col-form-label requerido text-left">Impedancia</label>
    <div class="col-sm-9">
      <input type="number" data-toggle="tooltip" title="Ingrese la Impedancia" class="form-control" name="impedancia" id="impedancia" placeholder="Impedancia" value="{{old('impedancia', $data->impedancia ?? '')}}" pattern="[0-9]" min="1" max="100" required />
    </div>
  </div>
@endif  