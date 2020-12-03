$(document).ready(function() {
    $(".irRegis").on("click", function() {
        window.location.href = "registrar.php";
    });

});

function ir(data) {
    if (data == 0) {
        window.location.href = "index.php";
    }
    if (data == 1) {
        menu();
        $(".loginCont").toggleClass("loginContOn");
    }
    if (data == 2) {
        window.location.href = "formularioCompra.php";
    }
    if (data == 3) {
        window.location.href = "politicasR.php";
    }
    if (data == 4) {
        window.location.href = "politicasPC.php";
    }

    if (data == 5) {
        crearModalEspera();
        $.ajax({
            async: true,
            data: { "ex": "ex" },
            type: "POST",
            url: "cerrarSession.php",
            success: function(a) {
                console.log(a);
                if (a == 1) {
                    setTimeout(function() { window.location.href = "index.php"; }, 100);
                }


            }
        });
    }
}

$(window).on("load", function() {
    cerrarModalEspera();
});



$(".hamburger").on("click", function() {
    menu();
});

function menu() {
    $(".stick1").toggleClass("stick1On");
    $(".stick2").toggleClass("stick2On");
    $(".contItemsMenu").toggleClass("contItemsMenuOn");
    $(".tapeContItemsMenu").toggleClass("tapeContItemsMenuOn    ");
}


$(".access").on("click", function() {
    $(".loginCont").toggleClass("loginContOn");

});

$(".access2").on("click", function() {
    window.location.href = "perfilUser.php";
});


function crearModalEspera() {
    dataLoader = '<div class="loading"><svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/></svg></div>';
    $('body').append(dataLoader);
    $(".loading").css("opacity", "1");
}

function cerrarModalEspera() {
    $(".loading").css("opacity", "0");
    setTimeout(function() { $(".loading").remove() }, 500);
}

//////// logiin acces con ajax

$(".btnLogin").on("click", function() {
    var count = 0;
    data = obtenerDatosForm("formLogin");

    if (vacio(data["user"])) {
        $(".log1").removeClass("error");
        $("#spnLog1").text("");
    } else {
        count += 1;
        $(".log1").addClass("error");
        $("#spnLog1").text("Este campo es obligatorio.");
        $("#inputLogin1").focus();
    }

    if (vacio(data["pass"])) {
        $(".log2").removeClass("error");
        $("#spnLog2").text("");
    } else {
        count += 1;
        $(".log2").addClass("error");
        $("#spnLog2").text("Este campo es obligatorio.");
        $("#inputLogin2").focus();
    }

    if (count == 0) {
        // enviar datos

        $.ajaxPrefilter(function(options, original_Options, jqXHR) {
            options.async = true;
        });
        $.ajax({
            async: true,
            data: { "loginAccess": data },
            type: "POST",
            url: "./ajax/access.php",
            success: function(loginVerify) {
                console.log(loginVerify);
                if (loginVerify == 1) {
                    $(".log1").removeClass("error");
                    $(".log2").removeClass("error");
                    $("#spnLog1").text("");
                    window.location.href = "perfilUser.php";
                } else {
                    $(".log1").addClass("error");
                    $(".log2").addClass("error");
                    $("#spnLog1").text("Usuario y/o contraseña incorrectos.");
                    $("#inputLogin1").focus();
                }
            }
        });
    }
});



function obtenerDatosForm(nombreForm) {
    var dataArray = $('.' + nombreForm).serializeArray(),
    dataObj = {};
    $(dataArray).each(function(i, field) {
        dataObj[field.name] = field.value;
    });
    return dataObj;
}



//crearModalAcepto("Estas Seguro?", "Confirmar desasociación")

function crearModalAcepto(tittle, mensaje) {

    var container = '<div class="coverContAcep"><div class="ContAcepInfo"><div class="alingContAc"></div></div></div>';
    var texto = '<h1>' + tittle + '</h1><p class="textMensajeAcep">' + mensaje + '</p>';
    var botones = '<div class="contBotnes"><button class="btnAcep btnAcep1" onclick="cerrarModalAcepto();">Cancelar</button><button class="btnAcep btnAcep2">Aceptar</button></div>'

    $("body").append(container);
    $(".alingContAc").append(texto);
    $(".alingContAc").append(botones);

}

function cerrarModalAcepto() {
    $(".coverContAcep").remove();
}