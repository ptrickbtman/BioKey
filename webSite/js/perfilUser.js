$(".btnValidar").on("click", function() {
    let data = $(".inputValidar").val();
    if (vacio(data) && validarTextoMasNum(data)) {
        $.ajaxPrefilter(function(options, original_Options, jqXHR) {
            options.async = true;
        });
        $.ajax({
            async: true,
            data: { "serial": data },
            type: "POST",
            url: "./ajax/validarCerraduraUsuario.php",
            success: function(vali) {
                console.log(vali);
            }
        });
    } else {
        $(".inputValidar").addClass("error");
    }
})