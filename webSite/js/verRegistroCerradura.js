$(document).ready(function() {
    crearPortada();

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
            } else if (registros == -1) {
                $(".txtPortada").text('No hay registros disponibles.');

                //window.location.href = "perfilUser.php";
            } else if (/^[\],:{}\s]*$/.test(registros.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                console.log("Registros encontrados");
                data = JSON.parse(registros);
                crearRegistros(data);
            }


        }
    });


});


function crearPortada() {
    data = '<div class="portada"><p class="txtPortada">Espere un momento <br><span>...</span></div>';
    $("body").append(data);
}


function crearRegistros(dataO) {

}