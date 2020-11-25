$(".btnModalReg").on("click", function() {
    window.location.href = "registrar.php";
});


particlesJS.load('particles-js', 'assets/particlesRegis.json', function() {
    console.log('callback - particles.js config loaded');
});


// es requerido importal el script validacion.js en el html

$(".registrar").on("click", function() {
    var count = 0
    data = obtenerDatosForm("formRegisterUser");

    //validamos datos usuario

    if (vacio(data["usuario"])) {
        $(".reg1").removeClass("error");
    } else {
        count += 1;
        $(".reg1").addClass("error");
    }

    // validar email
    if (vacio(data["email"]) && validarEmail(data["email"])) {
        $(".reg2").removeClass("error");
    } else {
        count += 1;
        $(".reg2").addClass("error");
    }

    //validar nombre
    if (vacio(data["nombre"]) && validarTextoMasNum(data["nombre"]) === false) {
        $(".reg3").removeClass("error");
    } else {
        count += 1;
        $(".reg3").addClass("error");
    }

    //validar apellido
    if (vacio(data["apellido"]) && validarTextoMasNum(data["apellido"]) === false) {
        $(".reg4").removeClass("error");
    } else {
        count += 1;
        $(".reg4").addClass("error");
    }



    // validador de pass
    if (vacio(data["pass1"]) && validarTextoMasNum(data["pass1"])) {
        $(".reg5").removeClass("error");
        if (data["pass2"] == data["pass1"]) {
            $(".reg6").removeClass("error");
        } else {
            count += 1;
            $(".reg6").addClass("error");
        }
    } else {
        count += 1;
        $(".reg5").addClass("error");

    }

    // validador de numero entre comillas
    if (vacio(data["num"])) {
        $(".reg7").removeClass("error");
    } else {
        count += 1;
        $(".reg7").addClass("error");
    }

    // datos ajax

    if (count == 0) {
        crearModalEspera();

        $.ajaxPrefilter(function(options, original_Options, jqXHR) {
            options.async = true;
        });
        $.ajax({
            async: true,
            data: { "dataRegis": data },
            type: "POST",
            url: "./ajax/register.php",
            success: function(regisData) {
                console.log(regisData);
                if (regisData == 1) {
                    console.log("crearModal");
                    crearModalValidado();
                    cerrarModalEspera();
                } else if (regisData == -2) {
                    $(".reg1").text("Nombre Usuario::");
                    $(".reg1").removeClass("error");
                    $(".reg2").text("Email ya registrado");
                    $(".reg2").addClass("error");
                    cerrarModalEspera();

                } else if (regisData == -2) {
                    $(".reg2").text("Email:");
                    $(".reg2").removeClass("error");
                    $(".reg1").text("Usuario ya registrado");
                    $(".reg1").addClass("error");
                    cerrarModalEspera();

                } else if (regisData == "-2-3") {
                    $(".reg1").text("Usuario ya registrado");
                    $(".reg1").addClass("error");
                    $(".reg2").text("Email ya registrado");
                    $(".reg2").addClass("error");
                    cerrarModalEspera();
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

function crearModalValidado() {
    var data = '<div class="modalRegistrado"><div class="contModal"><form action=""><p class="tittleModalReg">Bienvenido!</p><p class="subModalReg">Usuario correctamente registrado</p><input type="button" class="btnModalReg" value="aceptar" name="qweqwe"></form></div></div>';
    $("body").append(data)
    $(".modalRegistrado").css("opacity", "1");

}