particlesJS.load('particles-js', 'assets/particles.json', function() {
    console.log('callback - particles.js config loaded');
});


$(document).ready(function() {
    $(".btnSetPass").on("click", function() {
        changePass();
    });

    $(".btnSetNum").on("click", function() {
        changeNum();
    });
});

function changeNum() {
    data = obtenerDatosForm("formNum");
    if (vacio(data["num_tel"])) {
        if (data["num_tel"] >= 10000000) {
            $(".lblGes3").text("Numero:");
            $(".lblGes3").removeClass("error");
            setNumUser(data);
        } else {
            $(".lblGes3").text("Formato invalido:");
            $(".lblGes3").addClass("error");
        }
    } else {
        $(".lblGes3").text("Complete el campo:");
        $(".lblGes3").addClass("error");
    }
}

function setNumUser(data) {
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "numUser": data["num_tel"] },
        type: "POST",
        url: "./ajax/miCuenta.php",
        success: function(dataV) {
            console.log(dataV);
            if (dataV == 1) {
                location.reload();
            } else {
                cerrarModalEspera();
                alert("Error interno, intentelo nuevamente")
            }


        }
    });
}


function changePass() {
    data = obtenerDatosForm("formNPass");
    if (vacio(data["pass1"]) && vacio(data["pass2"])) {
        $(".lblGes1").remove("error");
        if (validarTextoMasNum(data["pass1"])) {
            $(".lblGes1").addClass("remove");
            if (data["pass1"] == data["pass2"]) {
                crearModalEspera();
                setDataUser(data);
                $(".lblGes2").text("Repita nueva coontraseña:");
                $(".lblGes2").addClass("error");

            } else {

                $(".lblGes2").addClass("error");
                $(".lblGes2").text("Contraseña no coincide:");
            }
        } else {
            $(".lblGes1").addClass("error");
            $(".lblGes1").text("Debe tener numero y letras");
        }
    } else {
        $(".lblGes1").addClass("error");
        $(".lblGes1").text("Complete los campos ");
    }
}


function setDataUser(data) {
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "passUser": data["pass1"] },
        type: "POST",
        url: "./ajax/miCuenta.php",
        success: function(dataV) {
            console.log(dataV);
            if (dataV == 1) {
                location.reload();
            } else {
                cerrarModalEspera();
                alert("Error interno, intentelo nuevamente")
            }


        }
    });
}