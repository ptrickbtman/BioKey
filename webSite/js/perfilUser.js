$(document).ready(function() {
    //console.log("hola");
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "a": 1 },
        type: "POST",
        url: "./ajax/perfil.php",
        success: function(vali) {
            //console.log("ajax1");
            console.log(vali);
            if (vali == 1) {
                crearFormValidador();
                //console.log("json recibido")
            } else if (/^[\],:{}\s]*$/.test(vali.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                //console.log("es json")
                console.log(vali)
                data = JSON.parse(vali);
                crearFormulariosCerraduras(data);
                crearActivador(data);
                console.log(data[0])
            } else if (vali == "") {
                //alert("Error de programacion: se solicita contacto con el administrado, muchas gracias ");
            } else {
                //alert("Error de programacion: se solicita contacto con el administrado, muchas gracias ");
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.log("Status: " + textStatus);
            console.log("Error: " + errorThrown);
        }
    });


});

function crearModalVali() {
    crearFormValidador();
    var data = '<p class="back" onclick="cerrarModalVali()" >Atras</p>';
    $(".formValid").append(data);
    setTimeout(function() {
        $(".back").css("opacity", "1")
    }, 500)
}

function crearActivador(dataO) {
    var data1 = '<div class="contActive"><div class="circle circleOn"></div></div>';
    var data2 = '<div class="contActive"><div class="circle circleOff"></div><</div>';
    for (var i = 0; i < Object.keys(dataO).length; i++) {
        $(" .contForm" + i + "").append(data1);
    }
}


////////////////////// funciones crearFormularios

function crearFormulariosCerraduras(dataO) {
    for (var i = 0; i < Object.keys(dataO).length; i++) {
        var data = '<div class="contForm contForm' + i + '"><form method="POST" action="gestionarCerradura.php" class="formCerraduras formCerraduras' + i + '"><input type="hidden" value="' + dataO[i].COD_CERR + '" name="idC"><p class="cerraduraTi">' + dataO[i].SERIAL_CERR + '</p><input type="submit" class="inputCerr inputCerr' + i + '" value="Administrar"></form></div>';
        //console.log(dataO[i].COD_CERR + " - " + dataO[i].SERIAL_CERR);
        //console.log(data)
        var add = '<div class="contAdd" onclick="crearModalVali()"><i class="fa fa-plus" aria-hidden="true"></i></div> '
        $(".contCover").append(data);
    }
    $(".contCover").append(add);
}

function crearFormValidador() {
    var form1 = '<div class="coverVali"><div class="contCoverVali"> <form class="formValid"><p class="tittleFormVali">Bienvenido</p><p class="subTittleFormVali">Ingresa el codigo del producto para agregarla a la cuenta</p><input type="text" class="inputValidar" placeholder="xxxx-xxxx-xxxx-xxx" name="code" ><input type="button" value="confirmar" class="btnValidar btnValidar2" onclick="validar()" id="btnValidarCuenta"></form></div></div>';
    $("body").append(form1);
    setTimeout(function() { $(".coverVali").css("opacity", "1") }, 100)

}

function validar() {
    let data = $(".inputValidar").val();
    console.log(data);
    if (vacio(data) && validarTextoMasNum(data)) {
        $.ajaxPrefilter(function(options, original_Options, jqXHR) {
            options.async = true;
        });
        $.ajax({
            async: true,
            data: { "serial": data },
            type: "POST",
            url: "./ajax/perfil.php",
            success: function(vali) {
                console.log(vali)
                if (vali == 1) {
                    window.location.reload();
                } else if (vali == -2 || vali == -3) {
                    alert("error de programación, contactese con el administrador");
                } else {
                    $(".inputValidar").addClass("error");
                }

            }
        });
    } else {
        $(".inputValidar").addClass("error");
    }
}

function cerrarModalVali() {
    $(".coverVali").css("opacity", "0");
    setTimeout(function() {
        $(".coverVali").remove()
    }, 1000)


}

particlesJS.load('particles-js', 'assets/particles.json', function() {
    console.log('callback - particles.js config loaded');
});