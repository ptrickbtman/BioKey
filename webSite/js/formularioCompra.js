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



    if (vacio(data["rutFC"])) {
        $(".lblComp1").removeClass("error");

    } else {
        count += 1;
        $(".lblComp1").addClass("error");
    }


    if (vacio(data["nomFC"]) && validarTextoMasNum(data["nomFC"]) === false) {
        $(".lblComp2").removeClass("error");
    } else {
        count += 1;
        $(".lblComp2").addClass("error");
    }

    if (vacio(data["apeFC"]) && validarTextoMasNum(data["apeFC"]) === false) {
        $(".lblComp3").removeClass("error");
    } else {
        count += 1;
        $(".lblComp3").addClass("error");
    }



    if (vacio(data["corFC"]) && validarEmail(data["corFC"]) === true) {
        $(".lblComp4").removeClass("error");
    } else {
        count += 1;
        $(".lblComp4").addClass("error");
    }



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

    alert(count);
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