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
                $('#opcMetP').append('<input type="radio" name="idMetP" value="'+i+'" onclick="actualizarSession(' + regisData[i].ID_METPAG + ',\''+regisData[i].NOM_METPAG+'\')" class="metPag"><span class="spnDatos">' + regisData[i].NOM_METPAG + '</span><br>');
            }
        }
    });



});


function actualizarSession(id, nom) {
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "idMetPagFC": id, "nomMetPagFC": nom},
        type: "POST",
        url: "./ajax/actSessCompra.php",
        success: function(respuesta) {
            console.log(respuesta);
        }
    });

}

function continuar(){
    var met = $('input:radio[name=idMetP]:checked').val();
    var count= 0;
    if (met === undefined) {
        count +=1;
        $("#err1").text("Debe seleccionar un metodo de pago.");
        $("#err1").focus();
    }else{
        $("#err1").text("");
    }
    if (!$('.check').is(':checked')) {
        count +=1;
        $("#err2").text("Debe aceptar nuestras politicas de seguridad.");
        $("#err2").focus();
    }else{
        $("#err2").text("");
    }
    if (count == 0) {
        location.href = $('.urlFinal').val();
    }
}