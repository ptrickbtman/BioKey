$(".registrar").on("click", function() {

data = obtenerDatosForm("formRegisterUser");
//--------------
var count = 0;
//validar

//--------------


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
                
            }
        });
}