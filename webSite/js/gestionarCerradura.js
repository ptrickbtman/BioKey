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
            datCerr = JSON.parse(datCerr);
            console.log(datCerr);
            $('#serGes').text(datCerr[0].SERIAL_CERR);
            $('#ssidActGes').text(datCerr[0].SSID_RED);
            if (datCerr[0].EST_CERR == 0) {
                desbloquearCerradura();
            }
        }
    });

    particlesJS.load('particles-js', 'assets/particlesRegis.json', function() {
        console.log('callback - particles.js config loaded');
    });

    $(".btnRegis").on("click", function() {
        id = $("#idC").val();
        url = "verRegistrosCerradura.php?idC=" + id;
        window.location.href = url;
    });

    $(".atras").on("click", function() {
        window.location.href = "perfilUser.php";
    });


    $(".desasociar").on("click", function() {
        crearModalAcepto('¿Estas seguro?', 'Pulsa aceptar para desasociar la cerradura');
    });


});

function desbloquear() {
    crearModalEspera();
    let idc = $('#idC').val();
    $.ajax({
        async: true,
        data: { "idC": idc },
        type: "POST",
        url: "./ajax/desbloquearCerradura.php",
        success: function(datCerr) {
            if (datCerr == 1) {
                window.location.reload();
            } else {
                alert("error al desbloquear, consultar con el administrador");
            }
        }
    });
}



function desbloquearCerradura() {
    //console.log("crer btn Desbloqueo");
    data = '<form class="desbloquearCerr"><input type="button" value="Desbloquear" class="btnDesbloqueo" onclick="desbloquear()"></form>';
    $(".contP").append(data);
}


function aceptarModal() {
    //console.log("hola");
    var idc = $('#idC').val();
    console.log(idc);
    $.ajax({
        async: true,
        data: { "idC": idc },
        type: "POST",
        url: "./ajax/desasociarC.php",
        success: function(desasociarC) {
            console.log(desasociarC);
            if (desasociarC == 1) {
                window.location.href = "perfilUser.php";
            } else if (desasociarC == -2) {
                alert("error de programacion");
            }
        }
    });
}

function rechazarrModal() {
    $(".coverContAcep").css("opacity", "0");
    setTimeout(function() {
        $(".coverContAcep").remove();
    }, 300)
}

function updateCerr(form) {

    datos = obtenerDatosForm(form);
    $(".lblGes1").removeClass("error");
    $(".lblGes2").removeClass("error");
    $(".lblGes3").removeClass("error");
    $(".lblGes4").removeClass("error");
    $("#spanGes1").text('');
    $("#spanGes2").text('');
    $("#spanGes3").text('');
    $("#spanGes4").text('');
    var count = 0;
    if (datos.idOp == '1') {

        if (vacio(datos["NPass"])) {
            if (validarNumero(datos["num"]) === false) {
                $(".lblGes1").removeClass("error");
                $(".lblGes2").removeClass("error");
                $("#spanGes1").text("");
                if (datos["RNPass"] == datos["NPass"]) {
                    $(".lblGes1").removeClass("error");
                    $(".lblGes2").removeClass("error");
                    $("#spanGes1").text("");
                } else {
                    count += 1;
                    $(".lblGes1").addClass("error");
                    $(".lblGes2").addClass("error");
                    $("#spanGes1").text("Las contraseñas no coinciden.");
                    $("#RNPass").focus();
                }
            } else {
                count += 1;
                $(".lblGes1").addClass("error");
                $(".lblGes2").addClass("error");
                $("#spanGes1").text("Las contraseña debe contener numeros y letras.");
                $("#NPass").focus();
            }
        } else {
            count += 1;
            $(".lblGes1").addClass("error");
            $(".lblGes2").addClass("error");
            $("#spanGes1").text("Estos campos son obligatorios.");
            $("#NPass").focus();
        }
    }

    if (datos.idOp == '2') {
        if (vacio(datos["NSsid"])) {
            $(".lblGes3").removeClass("error");
            $("#spanGes3").text('');
        } else {
            count += 1;
            $(".lblGes3").addClass("error");
            $("#spanGes3").text("Este campo es obligatorio.");
            $("#NSsid").focus();
        }
        if (vacio(datos["NWFPass"])) {
            $(".lblGes4").removeClass("error");
            $("#spanGes4").text('');
        } else {
            count += 1;
            $(".lblGes4").addClass("error");
            $("#spanGes4").text("Este campo es obligatorio.");
            $("#NWFPass").focus();
        }

    }

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
                if (datos.idOp == '1') {
                    if (respuesta == 1) {
                        alert("Contraseña actualizada correctamente.");
                        location.reload();
                    } else if (respuesta == 0) {
                        alert("Error al actualizar contraseña.");
                    }
                } else if (datos.idOp == '2') {
                    if (respuesta == 1) {
                        alert("Red WiFi actualizada correctamente.");
                        location.reload();
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

function desasociarCerr() {

}