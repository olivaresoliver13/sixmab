$(document).ready(function () {
    $('#icono').on('blur', function () {
        $('#mostrar-icono').removeClass().addClass($(this).val());
    });
});