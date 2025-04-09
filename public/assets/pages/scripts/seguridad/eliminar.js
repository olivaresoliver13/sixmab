$(document).ready(function () {
    $("#pricing-table").on('submit', '.form-eliminar', function () {
        event.preventDefault();
        const form = $(this);
        swal({
            title: '¿ Está seguro que desea eliminar el registro ?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            buttons: {
                cancel: "Cancelar",
                confirm: "Aceptar"
            },
        }).then((value) => {
            if (value) {
                ajaxRequest(form);
            } else {
                swal({
                    title: 'SIXMAB',
                    text: "Acción cancelada por el Usuario",
                    icon: 'warning',
                    buttons: {
                        confirm: "Aceptar"
                    },
                })
            }
        });
    });

    function ajaxRequest(form) {
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function (respuesta) {
                if (respuesta.mensaje == "ok") {
                    setTimeout(function () { location.reload(1); }, 1000);
                    Sixmab.notificaciones('El registro fue eliminado correctamente', 'Sixmab', 'success');
                } 
                else {
                    Sixmab.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sixmab', 'error');
                }
            },
            error: function () {
                Sixmab.notificaciones('El registro no pudo ser eliminado, hay recursos vinculados a este registro.', 'Sixmab', 'error');
            }
        });
    }
});