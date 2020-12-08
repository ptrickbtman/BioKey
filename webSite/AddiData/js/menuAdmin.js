function irAd(option) {
    if (option == 0) {
        verVentas();
    } else if (option == 1) {
        verPedidos();
    }
}

function verVentas() {
    crearModalEspera();
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "vent": 1 },
        url: "./ajax/listVenta.php",
        success: function(datCerr) {
            console.log(datCerr);

            if (datCerr == -2) {
                alert("no hay ventas asociadas");
                cerrarModalEspera();
            } else if (/^[\],:{}\s]*$/.test(datCerr.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                console.log("es json")
                data = JSON.parse(datCerr);
                crearModalListadoVenta(data)
                cerrarModalEspera();
            }
        }
    });
}


function crearModalListadoVenta(data) {
    let container = '<div class="containerVenta"><div class="contContainerVenta"><div class="alignVentas"></div></div></div>';
    $("body").append(container);
    let row = '<div class="row row0"><div class="contInfoVenta contInfoVenta5 infoT">ID_VENTA</div><div class="contInfoVenta contInfoVenta5">COD_CERR</div><div class="contInfoVenta contInfoVenta5 infoT">ID_BOL</div><div class="contInfoVenta contInfoVenta5" infoT>SUBTOT_VENT</div><div class="contInfoVenta contInfoVenta5 infoT">EST_LOG_VENTA</div></div>';
    $(".alignVentas").append(row);
    for (var i = 0; i < Object.keys(data).length; i++) {
        row = '<div class="row row' + (i + 1) + '"><div class="contInfoVenta5">' + data[i].ID_VENT + '</div><div class="contInfoVenta5">' + data[i].COD_CERR + '</div><div class="contInfoVenta5">' + data[i].ID_BOL + '</div><div class="contInfoVenta5">' + data[i].SUBTOT_VENT + '</div><div class="contInfoVenta5">' + data[i].EST_LOG_VENT + '</div></div>';
        $(".alignVentas").append(row);
    }

}