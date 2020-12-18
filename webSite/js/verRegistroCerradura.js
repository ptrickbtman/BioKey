$(document).ready(function() {
    crearPortada();

    particlesJS.load('particles-js', 'assets/particlesRegis.json', function() {
        console.log('callback - particles.js config loaded');
    });

    var idC = $("#idCe").val();

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    console.log("enviando post");
    $.ajax({
        async: true,
        data: { "idC": idC },
        type: "POST",
        url: "./ajax/registrosCerradura.php",
        success: function(registros) {
            console.log(registros)
            if (registros == -2) {
                $(".txtPortada").text('No tienes autorización para ver los registros de esta cerradura.');
                $(".txtPortada").append("<p class='btnFalsoBack'>Volver</p>")
            } else if (registros == -1) {
                $(".txtPortada").text('No hay registros disponibles.');
                $(".txtPortada").append("<p class='btnFalsoBack' onclick='volverPerfil()'>Volver</p>")
                    //window.location.href = "perfilUser.php";
            } else if (/^[\],:{}\s]*$/.test(registros.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                console.log("Registros encontrados");
                data = JSON.parse(registros);
                crearRegistros(data);
            }


        }
    });

});

function volverPerfil() {
    window.location.href = "perfilUser.php";
}


function crearPortada() {
    data = '<div class="portada"><p class="txtPortada">Espere un momento <br><span>...</span></div>';
    $("body").append(data);
}


function crearRegistros(dataO) {
    data1 = '<div class="cover"><h1>Registros</h1></div>';
    btnVoler = '<button class="btnColver" onclick="volver()" >Volver</button>'
    $("body").append(data1);
    var estado;


    console.log(dataO);

    for (var i = 0; i < Object.keys(dataO).length; i++) {

        if (dataO[i].ID_TIPREGIS == 1) {
            estado = "Acesso permitido.";
        } else if (dataO[i].ID_TIPREGIS == 2) {
            estado = "Acesso denegado.";
        } else if (dataO[i].ID_TIPREGIS == 3) {
            estado = "Cambio contraseña.";
        } else {
            estado = "Indefinido"
        }

        data2 = '<div class="row"><div class="left"><p class="date">' + dataO[i].FECH_REGIS + '</p></div> <div class="right"><p class="date">' + estado + '</p></div></div>'
        $(".cover").append(data2);

    }
    $(".cover").append(btnVoler);
    $(".portada").remove();

}


function volver() {
    window.location.href = "perfilUser.php";
}