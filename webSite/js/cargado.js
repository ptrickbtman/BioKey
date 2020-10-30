$(window).on("load", function() {
    setTimeout(deleteLoader(), 500);
})

function deleteLoader() {

    $(".loader").css("opacity", "0");
    setTimeout(function() {
        $(".loader").remove();
    }, 500)

}


$(".hamburger").on("click", function() {
    $(".stick1").toggleClass("stick1On");
    $(".stick2").toggleClass("stick2On");
    $(".stick3").toggleClass("stick3On")
    $(".itemsMenu").toggleClass("itemsMenuOn")
});


// login modal

$(".abrirModal").on("click", function() {
    $(".contLogin").addClass("contLoginOn")
    $(".modalLogin").addClass("modalLoginOn");
    setTimeout(function() {
        $(".contLoginBinary").addClass("contLoginBinaryOn");
        $(".contModalLogin").addClass("contModalLoginOn");
    }, 600)
});



$(".cerrarLogin").on("click", function() {
    $(".contLoginBinary").removeClass("contLoginBinaryOn");
    $(".contModalLogin").removeClass("contModalLoginOn");

    setTimeout(function() {
        $(".contLogin").removeClass("contLoginOn")
        $(".modalLogin").removeClass("modalLoginOn");

    }, 700)
});





$(".btnEnvio").on("click", function() {
    crearModalEsperaLogin();
    login("formLogin");
});

$(".btnRegistr").on("click", function() {
    window.location.replace("http://192.168.64.2/BioKey/webSite/register.php");
});

function login(nombreForm) {
    var dataObj = obtenerDatosForm(nombreForm);
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "loginAccess": dataObj },
        type: "POST",
        url: "./ajax/access.php",
        success: function(loginVerify) {
            console.log(loginVerify);
            if (loginVerify == "1") {
                window.location.replace("http://192.168.64.2/BioKey/webSite/perfil.php");
            }
        }
    });
}


/////////////////////////////////////////////////////////

function obtenerDatosForm(nombreForm) {
    var dataArray = $('.' + nombreForm).serializeArray(),
        dataObj = {};
    $(dataArray).each(function(i, field) {
        dataObj[field.name] = field.value;
    });
    return dataObj;
}

function crearModalEsperaLogin() {
    // $('.btnEnvio').prop('disabled', true);
    var modal = "<div class='modalEspera'><div class='circleModalEspera'></div></div>";
    $("body").append(modal);
}

function cerrarModalEspera() {
    $(".modalEspera").css("opacity", "0");
    setTimeout(function() {
        $(".modalEspera").remove();
    }, 500);
}