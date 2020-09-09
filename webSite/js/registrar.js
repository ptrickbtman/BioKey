$(".btnReg").on("click", function() {

    var dataArray = $('.' + "formRegister").serializeArray(),
        dataObj = {};
    $(dataArray).each(function(i, field) {
        dataObj[field.name] = field.value;
    });

    //console.log(dataObj);
    enviarData(dataObj);

});

function enviarData(dataObj) {
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "dataRegis": dataObj },
        type: "POST",
        url: "./ajax/register.php",
        success: function(loginVerify) {
            console.log(loginVerify);
        }
    });
}