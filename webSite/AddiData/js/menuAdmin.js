function irAd(option) {
    if (option == 0) {
        crearModalEspera();
        eliminarModal();
        menu();
        setTimeout(function() {
            verVentas();
        }, 100)

    } else if (option == 1) {
        crearModalEspera();
        eliminarModal();
        menu();
        verPedidos();
    } else if (option == 2) {
        crearModalEspera();
        eliminarModal();
        menu();
        verBoletas();
    } else if (option == 4) {
        crearModalEspera();
        $.ajax({
            async: true,
            data: { "ex": "ex" },
            type: "POST",
            url: "../cerrarSession.php",
            success: function(a) {
                console.log(a);
                if (a == 1) {
                    setTimeout(function() { window.location.href = "index.php"; }, 100);
                }


            }
        });
    }
}

function btnIndex(data) {
    if (data == 0) {
        crearModalEspera();
        eliminarModal();
        setTimeout(function() {
            verVentas();
        }, 100)

    } else if (data == 1) {
        crearModalEspera();
        eliminarModal();
        //menu();
        verPedidos();
    } else if (data == 2) {
        crearModalEspera();
        eliminarModal();
        setTimeout(function() {
            verBoletas();
        }, 100)
    }
}

function filtraBoletaId(idBol) {
    $.ajax({
        async: true,
        type: "POST",
        data: { "filterIdBoleta": idBol },
        url: "./ajax/listBoleta.php",
        success: function(datCerr) {
            console.log(datCerr);
            if (datCerr == -2) {
                alert("no hay boletas asociadas");
                cerrarModalEspera();
            } else if (/^[\],:{}\s]*$/.test(datCerr.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                console.log("es json")
                data = JSON.parse(datCerr);
                crearModalListadoBoletas(data)
                setTimeout(function() {
                    cerrarModalEspera();
                }, 200)
            }

        }
    });
}

function verBoletas() {
    $.ajax({
        async: true,
        type: "POST",
        data: { "boletas": 1 },
        url: "./ajax/listBoleta.php",
        success: function(datCerr) {
            console.log(datCerr);

            if (datCerr == -2) {
                alert("no hay boletas asociadas");
                cerrarModalEspera();
            } else if (/^[\],:{}\s]*$/.test(datCerr.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                console.log("es json")
                data = JSON.parse(datCerr);
                crearModalListadoBoletas(data)
                setTimeout(function() {
                    cerrarModalEspera();
                }, 200)
            }

        }
    });
}

function crearModalListadoBoletas(data) {
    let container = '<div class="containerDatos"><div class="subContainerDatos"><div class="alignDatos"><h3>Boletas </h3></div></div></div>';
    $("body").append(container);
    let row = '<div class="row row0"><div class="contInfoData contInfoData5 infoT">ID_BOLETA</div><div class="contInfoData contInfoData5">RUT_CLI</div><div class="contInfoData contInfoData5 infoT">CANT_PROD_BOL</div><div class="contInfoData contInfoData5" infoT>FECH_BOL</div><div class="contInfoData contInfoData5 infoT">ORDEN_BOL</div></div>';
    $(".alignDatos").append(row);
    for (var i = 0; i < Object.keys(data).length; i++) {

        row = '<div class="row row' + (i + 1) + '"><div class="contInfoData contInfoData5">' + data[i].ID_BOL + '</div><div class="contInfoData contInfoData5">' + data[i].RUT_CLI + '</div><div class="contInfoData contInfoData5">' + data[i].CANT_PROD_BOL + '</div><div class="contInfoData contInfoData5">' + data[i].FECH_BOL + '</div><div class="contInfoData contInfoData5">' + data[i].ORDEN_BOL + '</div></div>';
        $(".alignDatos").append(row);
    }
}

function verVentas() {
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
    console.log(data);
    let container = '<div class="containerDatos"><div class="subContainerDatos"><div class="alignDatos"><h3>Ventas</h3></div></div></div>';
    $("body").append(container);
    let row = '<div class="row row0"><div class="contInfoData contInfoData5 infoT">ID_VENTA</div><div class="contInfoData contInfoData5">COD_CERR</div><div class="contInfoData contInfoData5 infoT">ID_BOL</div><div class="contInfoData contInfoData5" infoT>SUBTOT_VENT</div><div class="contInfoData contInfoData5 infoT">EST_LOG_VENTA</div></div>';
    $(".alignDatos").append(row);
    for (var i = 0; i < Object.keys(data).length; i++) {

        row = '<div class="row row' + (i + 1) + '"><div class="contInfoData contInfoData5">' + data[i].ID_VENT + '</div><div class="contInfoData contInfoData5"><p onclick="filtraCerrId(' + data[i].COD_CERR + ')">Ver Cerr id: ' + data[i].COD_CERR + '<p></div><div class="contInfoData contInfoData5"><p onclick="filtraBoletaId(' + data[i].ID_BOL + ')">' + data[i].ID_BOL + '</p></div><div class="contInfoData contInfoData5">' + data[i].SUBTOT_VENT + '</div><div class="contInfoData contInfoData5">' + data[i].EST_LOG_VENT + '</div></div>';
        $(".alignDatos").append(row);
    }

}



//datos pedidos

function filtraCerrId(id) {
    crearModalEspera();
    eliminarModal();
    $.ajax({
        async: true,
        type: "POST",
        data: { "pedidoID": id },
        url: "./ajax/listPedidos.php",
        success: function(pedido) {
            console.log(pedido);
            if (/^[\],:{}\s]*$/.test(pedido.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                console.log("es json")
                data = JSON.parse(pedido);
                crearModalListadoPedidos(data);
                cerrarModalEspera();
            }
        }
    });
}

function verPedidos() {

    crearModalEspera();
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "pedidos": 1 },
        url: "./ajax/listPedidos.php",
        success: function(pedido) {
            console.log(pedido);
            if (/^[\],:{}\s]*$/.test(pedido.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                console.log("es json")
                data = JSON.parse(pedido);
                crearModalListadoPedidos(data);
                cerrarModalEspera();
            }
        }
    });
}

function filtarPedidos() {
    crearModalEspera();

    console.log("Filtando...");
    var data = [];
    if ($('input:text[name=estInput]').val() != "") {
        //console.log("paso estado ")
        data[0] = $('input:text[name=estInput]').val();
    } else {
        data[0] = 0;
    }

    if ($('input:text[name=serialInput]').val() != "") {
        //console.log("paso serial ")
        data[1] = $('input:text[name=serialInput]').val();
    } else {
        data[1] = 0;
    }

    if ($('input:text[name=idInput]').val() != "") {
        //console.log("paso id ")
        data[2] = $('input:text[name=idInput]').val();
    } else {
        data[2] = 0;
    }

    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    console.log("enviando datos ")
    setTimeout(function() {
        $.ajax({
            async: true,
            type: "POST",
            data: { "dataFilter": data },
            url: "./ajax/listPedidos.php",
            success: function(filter) {
                console.log(filter);

                if (/^[\],:{}\s]*$/.test(filter.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                    setTimeout(function() {
                        data = JSON.parse(filter);
                        crearModalListadoPedidos(data);
                        cerrarModalEspera();
                    }, 100)

                } else {
                    cerrarModalEspera();
                }

            }
        });
    }, 100)

}

function crearModalListadoPedidos(data) {
    let container = '<div class="containerDatos"><div class="subContainerDatos"><div class="alignDatos"><h3>Cerraduras</h3></div></div></div>';
    $("body").append(container);
    let row = '<div class="row row0"><div class="contInfoData contInfoData3 infoT">COD_CERR</div><div class="contInfoData contInfoData3">SERIAL_CERR</div><div class="contInfoData contInfoData3 infoT">EST_CERR</div></div>';
    $(".alignDatos").append(row);
    for (var i = 0; i < Object.keys(data).length; i++) {
        row = '<div class="row row' + (i + 1) + '"><div class="contInfoData3">' + data[i].COD_CERR + '</div><div class="contInfoData3">' + data[i].SERIAL_CERR + '</div><div class="contInfoData3"><input type="text" class="infoInput" value="' + data[i].EST_CERR + '"><input type="button" class="btnInput" value="cambiar"></div></div>';
        $(".alignDatos").append(row);
    }
    //<label><input type="checkbox" id="cbox1Ce">Compradas</label><label><input type="checkbox" id="cbox2Ce">Activas</label>
    let filters = '<div class="contFilter"><div class="contTiFiler"><h1>Filtros<h1></div><label>Estado: <input type="text" name="estInput" class="inputFilterTxt" placeholder=" 0,1,2,3,4"><label><label>Serial: <input type="text" name="serialInput" class="inputFilterTxt"><label><label>Id: <input type="text" name="idInput" class="inputFilterTxt"><label><input type="button" class="filterBtn" value="filtar" onclick="filtarPedidos()" ></div> ';
    $(".alignDatos").append(filters);
}

function eliminarModal() {
    if ($(".containerDatos")) {
        $(".containerDatos").remove();
        //console.log("eliminado");
    } else {
        console.log("No modal");
    }
}