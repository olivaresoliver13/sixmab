<li class="nav-item dropdown alarmas-b">
    <div class="nav-link" data-toggle="dropdown">
        <i class="far fa-bell fa-2x fa-bell-n" style="bottom: 3px; position: relative;"></i>  
            @if (num_notificaciones() > 0)
                <span class="badge badge-warning navbar-badge">
                <span style="font-size: 13px;" class="label label-warning" id="num_notificaciones">{{num_notificaciones()}}</span>
            @endif
        </span>
    </div>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right alarmas-b1">
        <span class="dropdown-item dropdown-header" style="font-size: 29px;">
            @if (num_notificaciones() > 1 || num_notificaciones() == 0) alarmas
            @elseif(num_notificaciones() == 1) alarma
            @endif 
        </span>
        <div class="dropdown-divider"></div>
        <div class="dropdown-item">
            @if (num_notificaciones() > 0)
                @foreach (detalle_notificaciones() as $notificacion)
                    @if ($notificacion)<br> 
                    <i class="fas fa-envelope mr-2"></i> {{$notificacion}}
                    @endif
                @endforeach
            @else 
                Sin Alarma para leer
            @endif
        </div>
        <div class="dropdown-divider"></div>
        <a href="{{ route('alarmas.index') }}" class="dropdown-item dropdown-footer">Ver todas las alarmas</a>
    </div>
</li>