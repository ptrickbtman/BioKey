$(document).ready(function() {

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        data: { "d2asdx3123sxxd1": 1 },
        type: "POST",
        url: "./ajax/perfil.php",
        success: function(vali) {
            console.log(vali);
            if (vali == 1) {
                crearFormValidador();
            } else if (/^[\],:{}\s]*$/.test(vali.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                data = JSON.parse(vali);
                crearFormulariosCerraduras(data);
            } else {
                console.log("error formato json")
            }
        }
    });

});

////////////////////// funciones crearFormularios

function crearFormulariosCerraduras(dataO) {

    for (var i = 0; i < Object.keys(dataO).length; i++) {
        var data = '<form class="formCerraduras"><input type="hidden" value="' + dataO[i].COD_CERR + '"><p class="cerraduraTi">' + dataO[i].SERIAL_CERR + '</p><input type="submit" value="Administrar"></form>';
        console.log(dataO[i].COD_CERR + " - " + dataO[i].SERIAL_CERR);
        console.log(data)
        $(".contCover").append(data);

    }
}

function crearFormValidador() {
    var form1 = '<form class=""><p class="tittleFormVali">Bienvenido</p><p class="subTittleFormVali">Ingresa el codigo del producto para validar la cuenta</p><input type="text" class="inputValidar" placeholder="xxxx-xxxx-xxxx-xxx" name="code" ><input type="button" value="confirmar" class="btnValidar"></form>';
    $(".contCover").append(form1);
}




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


//////////////////////////////////////