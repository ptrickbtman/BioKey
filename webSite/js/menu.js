$(window).on("load", function() {
    cerrarModalEspera();
});

$(".hamburger").on("click", function() {
    menu();
});

function menu() {
    $(".stick1").toggleClass("stick1On");
    $(".stick2").toggleClass("stick2On");
}


$(".access").on("click", function() {
    $(".loginCont").toggleClass("loginContOn");
});

$(".access2").on("click", function() {
    window.location.href = "http://192.168.64.2/BioKey/webSite/perfilUser.php?";
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
    } else {
        count += 1;
        $(".log1").addClass("error");
    }

    if (vacio(data["pass"])) {
        $(".log2").removeClass("error");
    } else {
        count += 1;
        $(".log2").addClass("error");
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