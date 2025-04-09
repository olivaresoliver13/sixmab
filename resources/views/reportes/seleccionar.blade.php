@extends('layouts.layouts')

@section('titulo')
  <div class="ico-sixmab1">
    <i class="fas fa-clipboard"></i>
    <span class="ml-2">Generar Reporte</span>
    <div class="w-100 alto1 alto2 mlinea-01">
      <a href="{{route('reportes')}}" class="btn btn-secondary btn-sm rounded-pill pull-right mr-1 class-volver" style="width: 130px;"><i class="fa fa-fw fa-reply-all mr-1 tam-ico"></i>{{ __('adminlte::adminlte.return') }}</a>
    </div>
  </div>
  <br>
  <h3>Empresa: {{$empresas->nombre}}</h3>
  <br>
@stop

@section('contenido')
  <div class="row" id="dist">
      <div class="col-lg-8 offset-md-2">
          <div class="card shadow-lg p-3 mb-5 bg-white rounded">
              <div class="card-header">
                  <h3 class="text-left"><span class="ml-2"><h4>Seleccione los datos necesarios para su reporte</h4></span></h3>    
              </div>
              <br>
              <form id="form_seleccionar" method="POST" action="{{route('reportes.menu', ['empresa' => $empresa])}}" >
                @csrf
                <div class="form-group">
                  <label for="tipo_reporte">Seleccione tipo de reporte</label>
                  <select class="form-control" id="tipo_reporte" name="tipo_reporte" required>
                    <option value="0" selected>Seleccione un reporte</option>
                    @foreach ($reportes as $key => $reporte)
                      <option value="{{$key}}">{{$reporte}}</option>
                    @endforeach
                  </select>
                </div>
                <br>
                <div class="form-group">
                  <label for="plantas">Seleccione planta/as</label>
                  <select class="form-control" id="plantas" name="plantas" required>
                    <option value="all" selected>Todas</option>
                    @foreach ($plantas as $planta)
                      <option value="{{$planta->id}}">{{$planta->nombre}}</option>
                    @endforeach
                  </select>
                </div>
                <br>
                <div class="form-group">
                  <label for="baterias">Seleccione bateria/as</label>
                  <select multiple class="form-control" id="baterias" name="baterias[]" required>
                    <option value="all" selected>Todas</option>
                    @foreach ($baterias as $bateria)
                      <option value="{{$bateria->id}}">{{$bateria->numero_bateria}}</option>
                    @endforeach
                  </select>
                </div>
                <br>
                <div class="form-group">
                  <label for="desde">Desde</label>
                  <input type="date" class="form-control" id="desde" placeholder="" name="desde" required>
                </div>
                <br>
                <div class="form-group">
                  <label for="hasta">Hasta</label>
                  <input type="date" class="form-control" id="hasta" placeholder="" name="hasta" required>
                </div>
                <br>
                <div id="mensaje_fecha"></div>
                <div class="form-group">
                  <center>
                    <input type="submit" class="btn btn-primary" id="obtener" value="Obtener reporte">
                  </center>
                </div>
              </form>  
          </div>
      </div>
  </div>

  <script type="text/javascript" src="{{asset("js/jquery-1.12.0.min.js")}}"></script>

  <script>
    $('#form_seleccionar').on('submit', function(e){

      desde = $('#desde');
      hasta = $('#hasta');
      
      if(desde.val() > hasta.val()){

        e.preventDefault();

        mensaje = "<div class='alert alert-danger alert-dismissible' role='alert'>";
        mensaje += "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
        mensaje += "<strong>Cuidado!</strong> Verifique que las fechas ingresadas son correctas.</div>";

        $('#mensaje_fecha').html(mensaje);
      }
    });

    const url = '/reportes/empresa/'+{{$empresa}}+'/baterias/';

    function imprimirBateria(bateria){
      return '<option value="' + bateria.id + '">' + bateria.numero_bateria + '</option>';
    }

    $( "#plantas" ).change(function() {

      let planta = $(this).val();

      $.get('http://localhost:8000/reportes/empresa/'+{{$empresa}}+'/'+ planta +'/baterias', (data) => {
        let baterias = JSON.parse(data);
        
        let select_baterias = $('#baterias');

        select_baterias.find('option').remove().end();

        select_baterias.append('<option value="all">Todas</option>');

        baterias.reduce( (acc, el) => {
          let option_bateria = imprimirBateria(el);
          select_baterias.append(option_bateria);
        }, {});
      });
    });
  </script>
@stop