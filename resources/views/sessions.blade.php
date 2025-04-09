@extends('layouts.layouts')

@section('scripts')
    <script src="{{asset("assets/pages/scripts/seguridad/tabla.js")}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(".delete-session").click(function(){
            var id = $(this).data("id");
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                url: "/delete-session",
                type: 'POST',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){
                    location.reload();
                }
            });
        });
    </script>
@endsection

@section('titulo')
    <i class="fas fa-user-shield"></i><span class="ml-2">Sesiones</span>
@stop

@section('contenido')
    <div class="box-body">
        <table class="table" data-order='[[ 0, "asc" ]]' data-page-length='10' style="border: 1px solid #dee2e6;" id="pricing-table">
            <thead class="thead-dark">
                <tr class="text-center">
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Usuario</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Agente</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">IP</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e;">Última actividad</th>
                    <th scope="col" style="border-left: 1px solid #8e8e8e; width: 40px;">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                    <tr class="text-center" id="session_{{$session->id}}">
                        <td class="text-left" style="border-left: 1px solid #dee2e6;">{{ $session->name }}</td>
                        <td class="text-left" style="border-left: 1px solid #dee2e6;">{{ $session->user_agent }}</td>
                        <td style="border-left: 1px solid #dee2e6;">{{ $session->ip_address }}</td>
                        <td class="text-left" style="border-left: 1px solid #dee2e6;">{{ \Carbon\Carbon::createFromTimeStamp($session->last_activity)->diffForhumans() }}</td>
                        <td class="text-center" style="border-left: 1px solid #dee2e6;">
                            <button type="button" name="button" class="delete-session btn btn-sm btn-danger"  data-id="{{ $session->id }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop