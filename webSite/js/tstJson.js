$(document).ready(function() {
    var data = 5;
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "id": data },
        type: "POST",
        url: "./ajax/testJSON.php",
        success: function(data) {

            data = JSON.parse(data)
            console.log(data);


        }
    });




});