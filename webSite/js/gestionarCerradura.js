$(document).ready(function() {
    var idc = $('#idC').val();

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "idC": idc },
        type: "POST",
        url: "./ajax/buscarCerradura.php",
        success: function(datCerr) {
            console.log(datCerr)
            datCerr = JSON.parse(datCerr);
            $('#serGes').text(datCerr[0].SERIAL_CERR);
            $('#ssidActGes').text(datCerr[0].SSID_RED);
        }
    });

    particlesJS.load('particles-js', 'assets/particlesRegis.json', function() {
        console.log('callback - particles.js config loaded');
    });

    $(".btnRegis").on("click", function() {
        id = $("#idC").val();
        url = "registrosCerradura.php?idC=" + id;
        window.location.href = url;
    });

});

function updateCerr(form) {

    datos = obtenerDatosForm(form);

    var count = 0;



    if (count == 0) {

        $.ajaxPrefilter(function(options, original_Options, jqXHR) {
            options.async = true;
        });
        $.ajax({
            async: true,
            data: { "datosForm": datos },
            type: "POST",
            url: "./ajax/actualizarCerradura.php",
            success: function(respuesta) {
                console.log(respuesta);
                if (datos.idOp == '1') {
                    if (respuesta == 1) {
                        alert("Contraseña actualizada correctamente.");
                    } else if (respuesta == 0) {
                        alert("Error al actualizar contraseña.");
                    }
                } else if (datos.idOp == '2') {
                    if (respuesta == 1) {
                        alert("Red WiFi actualizada correctamente.");
                    } else if (respuesta == 0) {
                        alert("Error al actualizar red WiFi.");
                    }
                }
            }

        });
    }
}

function obtenerDatosForm(nombreForm) {
    var dataArray = $('.' + nombreForm).serializeArray(),
        dataObj = {};
    $(dataArray).each(function(i, field) {
        dataObj[field.name] = field.value;
    });
    return dataObj;
}