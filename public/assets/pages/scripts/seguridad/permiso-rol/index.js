$('.permission_role').on('change', function () {
    var data = {
        permission_id: $(this).data('permisoid'),
        role_id: $(this).val(),
        _token: $('input[name=_token]').val()
    };
    if ($(this).is(':checked')) {
        data.estado = 1
    } else {
        data.estado = 0
    }
    ajaxRequest('/permisos_roles', data);
});

function ajaxRequest (url, data) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        success: function (respuesta) {
            Sixmab.notificaciones(respuesta.respuesta, 'Sixmab', 'success');
        }
    });
}