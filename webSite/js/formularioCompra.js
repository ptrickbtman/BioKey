$(document).ready(function() {


    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        url: "./ajax/llenarDatosDireccion.php",
        success: function(regisData) {
            regisData = JSON.parse(regisData);
            for (var i = 0; i < Object.keys(regisData[0]).length; i++) {
                $('#regFC').append("<option value='"+regisData[0][i].ID_REGION+"' >"+regisData[0][i].NOM_REGION+"</option>");
            }
            for (var i = 0; i < Object.keys(regisData[1]).length; i++) {
                $('#ciuFC').append("<option value='"+regisData[1][i].ID_CIU+"' >"+regisData[1][i].NOM_CIU+"</option>");
            }
        }
    });

    $("#btnContinuar").on("click", function() {
        data = obtenerDatosForm("formCompra");

        var count = 0;



        if (count == 0) {

            $.ajaxPrefilter(function(options, original_Options, jqXHR) {
                options.async = true;
            });
            $.ajax({
                async: true,
                data: { "regisData": data },
                type: "POST",
                url: "./ajax/formularioCompra.php",
                success: function(regisData) {
                    console.log(regisData);

                    if (regisData == "1") {
                        location.href="confirmarCompra.php";
                    }
                }
            });
        }
    });
});

function obtenerDatosForm(nombreForm) {
    var dataArray = $('.' + nombreForm).serializeArray(),
    dataObj = {};
    $(dataArray).each(function(i, field) {
        dataObj[field.name] = field.value;
    });
    return dataObj;
}