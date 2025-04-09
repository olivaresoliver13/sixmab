@if (session("mensaje"))
  <div class="alert alert-success alert-dismissible fade show dist-ico" role="alert" data-auto-dismiss="10000">
    <i class="fa fa-check"></i> <strong>{{ __('adminlte::adminlte.message') }} SIXMAB</strong>
    <br>
    {{ session("mensaje") }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <br>
@endif