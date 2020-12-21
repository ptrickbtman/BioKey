$(document).ready(function() {
    particlesJS.load('particles-js', 'assets/particlesRegis.json', function() {
        console.log('callback - particles.js config loaded');
    });

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        url: "./ajax/llenarDatosDireccion.php",
        success: function(regisData) {
            regisData = JSON.parse(regisData);
            for (var i = 0; i < Object.keys(regisData[0]).length; i++) {
                $('#regFC').append("<option value='" + regisData[0][i].ID_REGION + "' >" + regisData[0][i].NOM_REGION + "</option>");
            }
            for (var i = 0; i < Object.keys(regisData[1]).length; i++) {
                $('#ciuFC').append("<option value='" + regisData[1][i].ID_CIU + "' >" + regisData[1][i].NOM_CIU + "</option>");
            }
        }
    });

});

function continuarCompra() {
    data = obtenerDatosForm("formCompra");
    var count = 0;

    //Rut//

    if (vacio(data["rutFC"])) {
        $(".lblComp1").removeClass("error");
        $("#spnValComp1").text("");

        if (validarRut(data["rutFC"]) == true && data["rutFC"].length > 4) {
            $(".lblComp1").removeClass("error");
            $("#spnValComp1").text("");
        } else {
            count += 1;
            $(".lblComp1").addClass("error");
            $("#spnValComp1").text("Rut ingresado no valido.");
            $("#rutFC").focus();
        }
    } else {
        count += 1;
        $(".lblComp1").addClass("error");
        $("#spnValComp1").text("Este campo es obligatorio.");
        $("#rutFC").focus();

    }


    //Nombre//

    if (vacio(data["nomFC"])) {
        $(".lblComp2").removeClass("error");
        $("#spnValComp2").text("");

        if (validarTextoMasNum(data["nomFC"]) === false) {
            $(".lblComp2").removeClass("error");
            $("#spnValComp2").text("");
        } else {
            count += 1;
            $(".lblComp2").addClass("error");
            $("#spnValComp2").text("Este campo no puede contener numeros.");
            $("#nomFC").focus();
        }

    } else {
        count += 1;
        $(".lblComp2").addClass("error");
        $("#spnValComp2").text("Este campo es obligatorio.");
        $("#nomFC").focus();
    }




    //apellido//



    if (vacio(data["apeFC"])) {
        $(".lblComp3").removeClass("error");
        $("#spnValComp3").text("");

        if (validarTextoMasNum(data["apeFC"]) === false) {
            $(".lblComp3").removeClass("error");
            $("#spnValComp3").text("");
        } else {
            count += 1;
            $(".lblComp3").addClass("error");
            $("#spnValComp3").text("Este campo no puede contener numeros.");
            $("#apeFC").focus();
        }

    } else {
        count += 1;
        $(".lblComp3").addClass("error");
        $("#spnValComp3").text("Este campo es obligatorio.");
        $("#apeFC").focus();
    }



    //correo//

    if (vacio(data["corFC"])) {
        $(".lblComp4").removeClass("error");
        $("#spnValComp4").text("");
        if (validarEmail(data["corFC"]) === true) {
            $(".lblComp4").removeClass("error");
            $("#spnValComp4").text("");
        } else {
            count += 1;
            $(".lblComp4").addClass("error");
            $("#spnValComp4").text("Correo ingresado no valido.");
            $("#corFC").focus();
        }

    } else {
        count += 1;
        $(".lblComp4").addClass("error");
        $("#spnValComp4").text("Este campo es obligatorio.");
        $("#corFC").focus();
    }

    //telefono//

    if (vacio(data["telFC"])) {
        $(".lblComp5").removeClass("error");
        $("#spnValComp5").text("");

        if (validarNumero(data["telFC"]) == true) {
            $(".lblComp5").removeClass("error");
            $("#spnValComp5").text("");
        } else {
            count += 1;
            $(".lblComp5").addClass("error");
            $("#spnValComp5").text("Este campo solo puede contener numeros.");
            $("#telFC").focus();
        }

    } else {
        count += 1;
        $(".lblComp5").addClass("error");
        $("#spnValComp5").text("Este campo es obligatorio.");
        $("#spnValComp5").focus("");
    }

    //region//

    if (vacio(data["regFC"])) {
        $(".lblComp6").removeClass("error");
    } else {
        count += 1;
        $(".lblComp6").addClass("error");
        $("#spnValComp6").text("Debe seleccionar una opcion.");
        $("#regFC").focus();
    }

    //ciudad//

    if (vacio(data["ciuFC"])) {
        $(".lblComp7").removeClass("error");
    } else {
        count += 1;
        $(".lblComp7").addClass("error");
        $("#spnValComp7").text("Debe seleccionar una opcion.");
        $("#ciuFC").focus();
    }

    //comuna//

    if (vacio(data["comFC"])) {
        $(".lblComp8").removeClass("error");
        $("#spnValComp8").text("");

        if (validarTextoMasNum(data["comFC"]) == false) {
            $(".lblComp8").removeClass("error");
            $("#spnValComp8").text("");
        } else {
            count += 1;
            $(".lblComp8").addClass("error");
            $("#spnValComp8").text("Este campo no puede contener numeros.");
            $("#comFC").focus();
        }
    } else {
        count += 1;
        $(".lblComp8").addClass("error");
        $("#spnValComp8").text("Este campo es obligatorio.");
        $("#comFC").focus();
    }

    //calle 1//

    if (vacio(data["call1FC"])) {
        $(".lblComp9").removeClass("error");
        $("#spnValComp9").text("");

        if (validarTextoMasNum(data["call1FC"]) === false) {
            $(".lblComp9").removeClass("error");
            $("#spnValComp9").text("");
        } else {
            count += 1;
            $(".lblComp9").addClass("error");
            $("#spnValComp9").text("Este campo no puede contener numeros.");
            $("#call1FC").focus();
        }
    } else {
        count += 1;
        $(".lblComp9").addClass("error");
        $("#spnValComp9").text("Este campo es obligatorio.");
        $("#call1FC").focus();
    }

    //numero//

    if (vacio(data["numFC"])) {
        $(".lblComp11").removeClass("error");
        $("#spnValComp11").text("");

        if (validarNumero(data["numFC"]) == true) {
            $(".lblComp11").removeClass("error");
            $("#spnValComp11").text("");
        } else {
            count += 1;
            $(".lblComp11").addClass("error");
            $("#spnValComp11").text("Este campo solo puede contener numeros.");
            $("#numFC").focus();
        }
    } else {
        count += 1;
        $(".lblComp11").addClass("error");
        $("#spnValComp11").text("Este campo es obligatorio.");
        $("#numFC").focus();
    }


    //cantidad//

    if (vacio(data["cantiFC"])) {
        $(".lblComp14").removeClass("error");
        $("#spnValComp14").text("");

        if (parseInt(data["cantiFC"]) > 0 && parseInt(data["cantiFC"]) <= 10) {
            $(".lblComp14").removeClass("error");
            $("#spnValComp14").text("");
        } else {
            count += 1;
            $(".lblComp14").addClass("error");
            $("#spnValComp14").text("Por ahora solo se pueden comprar de 1 a 10 cerradudas.");
            $("#cantiFC").focus();
        }

    } else {
        count += 1;
        $(".lblComp14").addClass("error");
        $("#spnValComp14").text("Este campo es obligatorio.");
        $("#cantiFC").focus();
    }


    if (count == 0) {
        $.ajaxPrefilter(function(options, original_Options, jqXHR) {
            options.async = true;
        });
        $.ajax({
            async: true,
            data: { "regisData": data },
            type: "POST",
            url: "./ajax/formularioCompra.php",
            success: function(regisData) {
                console.log(regisData);

                if (regisData == "1") {
                    location.href = "confirmarCompra.php";
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