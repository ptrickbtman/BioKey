$(document).ready(function() {

    datos = obtenerDatosForm("datosCompra");

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "datosVenta": datos },
        type: "POST",
        url: "./ajax/registrarVenta.php",
        success: function(regisData) {
            console.log(regisData)
            if (regisData == 1) {
                window.location.href = "compraAprobada.php";
            }
        }
    });



});

function obtenerDatosForm(nombreForm) {
    var dataArray = $('.' + nombreForm).serializeArray(),
        dataObj = {};
    $(dataArray).each(function(i, field) {
        dataObj[field.name] = field.value;
    });
    return dataObj;
}