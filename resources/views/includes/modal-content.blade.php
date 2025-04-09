<div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" id="exampleModalCenterTitle">@yield('titulo')</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      @yield('cuerpo')
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('adminlte::adminlte.close') }}</button>
      @yield('botones')
    </div>
  </div>