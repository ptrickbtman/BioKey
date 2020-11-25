$(document).ready(function() {
    crearPortada();

    var idC = $("#idCe").val();

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "idC": idC },
        type: "POST",
        url: "./ajax/registrosCerradura.php",
        success: function(registros) {
            console.log(registros)

            /*regisData = JSON.parse(regisData);
            for (var i = 0; i < Object.keys(regisData[0]).length; i++) {
                $('#regFC').append("<option value='" + regisData[0][i].ID_REGION + "' >" + regisData[0][i].NOM_REGION + "</option>");
            }
            for (var i = 0; i < Object.keys(regisData[1]).length; i++) {
                $('#ciuFC').append("<option value='" + regisData[1][i].ID_CIU + "' >" + regisData[1][i].NOM_CIU + "</option>");
            }
            */
        }
    });


});


function crearPortada() {
    data = '<div class="portada"><p class="txtPortada">Espere un momento <br><span>...</span></div>';
    $("body").append(data);
}