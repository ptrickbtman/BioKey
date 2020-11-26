$(document).ready(function() {

    particlesJS.load('particles-js', 'assets/particlesRegis.json', function() {
        console.log('callback - particles.js config loaded');
    });

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        url: "./ajax/llenarMetodosPag.php",
        success: function(regisData) {
            regisData = JSON.parse(regisData);
            console.log(regisData);
            for (var i = 0; i < Object.keys(regisData).length; i++) {
                $('#opcMetP').append('<input type="radio" name="idMetP" onclick="actualizarSession(' + regisData[i].ID_METPAG + ')" class="metPag"><span class="spnDatos">' + regisData[i].NOM_METPAG + '</span><br>');
            }
        }
    });



});


function actualizarSession(id) {
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "idMetPag": id },
        type: "POST",
        url: "./ajax/actSessCompra.php",
        success: function(respuesta) {
            console.log(respuesta);
        }
    });

}