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

function continuarCompra(){
    data = obtenerDatosForm("formCompra");
    var count = 0;

    //Rut//

    if (vacio(data["rutFC"])) {
        $(".lblComp1").removeClass("error");
        $("#spnValComp1").text("");

        if (validarRut(data["rutFC"]) == true) {
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
            $(".lblComp3").addClass("error");
            $("#spnValComp3").text("Correo ingresado no valido.");
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
    } else {
        count += 1;
        $(".lblComp5").addClass("error");
    }



    if (vacio(data["regFC"])) {
        $(".lblComp6").removeClass("error");
    } else {
        count += 1;
        $(".lblComp6").addClass("error");
    }


    if (vacio(data["ciuFC"])) {
        $(".lblComp7").removeClass("error");
    } else {
        count += 1;
        $(".lblComp7").addClass("error");
    }



    if (vacio(data["comFC"]) && validarTextoMasNum(data["comFC"]) === false) {
        $(".lblComp8").removeClass("error");
    } else {
        count += 1;
        $(".lblComp8").addClass("error");
    }



    if (vacio(data["call1FC"]) && validarTextoMasNum(data["call1FC"]) === false) {
        $(".lblComp9").removeClass("error");
    } else {
        count += 1;
        $(".lblComp9").addClass("error");
    }



    if (vacio(data["numFC"])) {
        $(".lblComp11").removeClass("error");
    } else {
        count += 1;
        $(".lblComp11").addClass("error");
    }



    if (vacio(data["cantiFC"])) {
        $(".lblComp14").removeClass("error");
    } else {
        count += 1;
        $(".lblComp14").addClass("error");
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