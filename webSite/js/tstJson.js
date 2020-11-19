$(document).ready(function() {

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "loginAccess": data },
        type: "POST",
        url: "./ajax/access.php",
        success: function(loginVerify) {
            console.log(loginVerify);
        }
    });

});