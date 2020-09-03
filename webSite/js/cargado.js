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
    login();
});

function login() {
    var dataArray = $('.' + 'formLogin').serializeArray(),
        dataObj = {};
    $(dataArray).each(function(i, field) {
        dataObj[field.name] = field.value;
    });

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "loginAccess": dataObj },
        type: "POST",
        url: "./controller/access.php",
        success: function(loginVerify) {
            console.log(loginVerify);
        }
    });
}


function crearModalEsperaLogin() {
    $('.btnEnvio').prop('disabled', true);
    var modal = "<div class='modalEspera'><div class='circleModalEspera'></div></div>";
    $("body").append(modal);
}

function cerrarModalEspera() {
    $(".modalEspera").css("opacity", "0");
    setTimeout(function() {
        $(".modalEspera").remove();
    }, 500);
}