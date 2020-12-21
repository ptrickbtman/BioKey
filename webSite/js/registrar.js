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
        $("#spnReg1").text("");
    } else {
        count += 1;
        $(".reg1").addClass("error");
        $("#spnReg1").text("Este campo es obligatorio.");
        $("#usuario").focus();
    }

    // validar email

    if (vacio(data["email"])) {
        $(".reg2").removeClass("error");
        $("#spnReg2").text("");

        if (validarEmail(data["email"]) == true) {
            $(".reg2").removeClass("error");
            $("#spnReg2").text("");
        } else {
            count += 1;
            $(".reg2").addClass("error");
            $("#spnReg2").text("Correo ingresado no valido.");
            $("#email").focus();
        }
    } else {
        count += 1;
        $(".reg2").addClass("error");
        $("#spnReg2").text("Este campo es obligatorio.");
        $("#email").focus();
    }

    //validar nombre
    if (vacio(data["nombre"])) {
        $(".reg3").removeClass("error");
        $("#spnReg3").text("");

        if (validarTextoMasNum(data["nombre"]) === false) {
            $(".reg3").removeClass("error");
            $("#spnReg3").text("");
        } else {
            count += 1;
            $(".reg3").addClass("error");
            $("#spnReg3").text("Este campo no puede contener numeros.");
            $("#nombre").focus();
        }
    } else {
        count += 1;
        $(".reg3").addClass("error");
        $("#spnReg3").text("Este campo es obligatorio.");
        $("#nombre").focus();
    }

    //validar apellido
    if (vacio(data["apellido"])) {
        $(".reg4").removeClass("error");
        $("#spnReg4").text("");

        if (validarTextoMasNum(data["apellido"]) === false) {
            $(".reg4").removeClass("error");
            $("#spnReg4").text("");
        } else {
            count += 1;
            $(".reg4").addClass("error");
            $("#spnReg4").text("Este campo no puede contener numeros.");
            $("#apellido").focus();
        }
    } else {
        count += 1;
        $(".reg4").addClass("error");
        $("#spnReg4").text("Este campo es obligatorio.");
        $("#apellido").focus();
    }

    //tel
    if (vacio(data["num"])) {
        $(".reg5").removeClass("error");
        $("#spnReg5").text("");

        if (validarNumero(data["num"]) == true) {
            $(".reg5").removeClass("error");
            $("#spnReg5").text("");
        } else {
            count += 1;
            $(".reg5").addClass("error");
            $("#spnReg5").text("Este campo solo puede contener numeros.");
            $("#num").focus();
        }

    } else {
        count += 1;
        $(".reg5").addClass("error");
        $("#spnReg5").text("Este campo es obligatorio.");
        $("#num").focus("");
    }

    // validador de pass

    if (vacio(data["pass1"])) {
        if (validarTextoMasNum(data["pass1"])) {
            $(".reg6").removeClass("error");
            $(".reg7").removeClass("error");
            $("#spnReg6").text("");
            if (data["pass2"] == data["pass1"]) {
                $(".reg6").removeClass("error");
                $(".reg7").removeClass("error");
                $("#spnReg6").text("");
            } else {
                count += 1;
                $(".reg6").addClass("error");
                $(".reg7").addClass("error");
                $("#spnReg6").text("Las contraseñas no coinciden.");
                $("#pass2").focus();
            }
        } else {
            count += 1;
            $(".reg6").addClass("error");
            $(".reg7").addClass("error");
            $("#spnReg6").text("Las contraseña debe contener numeros y letras.");
            $("#pass1").focus();
        }
    } else {
        count += 1;
        $(".reg6").addClass("error");
        $(".reg7").addClass("error");
        $("#spnReg6").text("Estos campos son obligatorios.");
        $("#pass1").focus();
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
                    $("#spnReg1").text("");
                    $(".reg1").removeClass("error");
                    $("#spnReg1").text("");
                    $(".reg2").removeClass("error");
                    console.log("crearModal");
                    crearModalValidado();
                    cerrarModalEspera();
                } else if (regisData == -2) {
                    $("#spnReg2").text("Email ya registrado");
                    $(".reg2").addClass("error");
                    cerrarModalEspera();

                } else if (regisData == -3) {
                    $("#spnReg1").text("Usuario ya registrado");
                    $(".reg1").addClass("error");
                    cerrarModalEspera();

                } else if (regisData == "-2-3") {
                    $("#spnReg1").text("Usuario ya registrado");
                    $(".reg1").addClass("error");
                    $("#spnReg2").text("Email ya registrado");
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
    var data = '<div class="modalRegistrado"><div class="contModal"><form action=""><p class="tittleModalReg">Bienvenido!</p><p class="subModalReg">Usuario correctamente registrado</p><input type="button" class="btnModalReg" onclick="salir()" value="aceptar" name="qweqwe"></form></div></div>';
    $("body").append(data)
    $(".modalRegistrado").css("opacity", "1");

}


function salir() {
    window.location.href = "registrar.php";
}