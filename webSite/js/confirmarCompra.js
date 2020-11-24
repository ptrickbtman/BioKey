$(document).ready(function() {


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
                $('#opcMetP').append('<input type="radio" name="idMetP" class="metPag" value="'+regisData[i].ID_METPAG+'"><span class="spnDatos">'+regisData[i].NOM_METPAG+'</span><br>');
            }
        }
    });

    $(".metPag").on("click", function() {
        alert('afdadsf');
    });

});

