@extends('adminlte::page')

@section('title', 'SIXMAB')

  @section('content_header')
    <h1 class="ico-sixmab1">@yield('titulo')</h1>
  @stop

  <link rel="shortcut icon" href="{{asset('favicons/favicon.png')}}">

  <link rel="stylesheet" href="{{asset('css/styles-personales.css')}}">
  <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  @yield('styles')
    
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">

  @section('content')

  @yield('contenido')

  <!-- Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div id="modal-content" class="modal-content"></div>
    </div>
  </div>

@stop

<script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>

@section('js')

  {{-- Validación de formulario --}}
  <script type="text/javascript" src="{{asset('assets/js/jquery-validation/jquery.validate.min.js')}}"></script>
  {{-- Fin validación de formulario --}}

  {{-- Validación de formulario en español --}}
  <script type="text/javascript" src="{{asset('assets/js/jquery-validation/localization/messages_es.min.js')}}"></script>
  {{-- Fin validación de formulario en español --}}

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  {{-- Validación funciones --}}
  <script type="text/javascript" src="{{asset('assets/js/scripts.js')}}"></script>
  <script type="text/javascript" src="{{asset('assets/js/funciones.js')}}"></script>
  {{-- Fin validación funciones --}}

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  @yield('scriptsPlugin')
  
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  
  @yield('scripts')
@stop

<script>
  $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
  });
</script>

<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>