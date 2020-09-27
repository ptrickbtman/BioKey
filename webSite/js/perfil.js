$(document).ready(function() {
    console.log("ready!");

    $(".btnVerify").on("click", function() {

        var dataArray = $('.' + "contVeryfu").serializeArray(),
            dataObj = {};
        $(dataArray).each(function(i, field) {
            dataObj[field.name] = field.value;
        });
        //console.log(dataObj);
        enviarData(dataObj);
    });
});




function enviarData(dataObj) {
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "codigoProducto": dataObj },
        type: "POST",
        url: "./ajax/perfil.php",
        success: function(code) {
            console.log(code);
        }
    });
}