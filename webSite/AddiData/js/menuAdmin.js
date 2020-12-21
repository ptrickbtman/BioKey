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
        setTimeout(function() {
            verCerraduras();
        }, 100)


    } else if (option == 2) {
        crearModalEspera();
        eliminarModal();
        menu();
        verBoletas();
    } else if (option == 3) {
        crearModalEspera();
        eliminarModal();
        menu();
        verPedidos();

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
        setTimeout(function() {
            verCerraduras();
        }, 100)



    } else if (data == 2) {
        crearModalEspera();
        eliminarModal();
        setTimeout(function() {
            verBoletas();
        }, 100)
    } else if (data == 3) {
        crearModalEspera();
        eliminarModal();
        //menu();
        verPedidos();
    }
}

function eliminarModal() {
    if ($(".containerDatos")) {
        $(".containerDatos").remove();
        //console.log("eliminado");
    } else {
        console.log("No modal");
    }
}

//TODO DE VENTAS

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
            //console.log(datCerr);

            if (datCerr == -2) {
                alert("No hay ventas asociadas");
                cerrarModalEspera();
            } else if (/^[\],:{}\s]*$/.test(datCerr.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                //console.log("es json")
                data = JSON.parse(datCerr);
                crearModalListadoVenta(data)
                cerrarModalEspera();
            }
        }
    });
}


function crearModalListadoVenta(data) {
    //console.log(data);
    let est = '';
    let btn = '';
    let row = '';


    $("body").append('<div class="containerDatos"><div class="subContainerDatos"><div class="alignFiltros"></div></br><div class="alignDatos"><h3>Boletas:</h3></div></div></div>');
    $(".alignFiltros").append('<label class="lblFlitros">Estado del pedido:</label><select class="selEsts" onchange="filtrarVentas()"><option value="Activo">Activos</option><option value="Enviado">Enviados</option><option value="Anulado">Anulados</option></select><label class="lblFlitros">Buscar:</label><input type="text" id="txtBuscar" maxlength="20" onkeyup="filtrarVentas()" placeholder="id, orden, rut, fecha">');
    $(".alignDatos").append('<div class="row"><div class="contInfoData contInfoData7 infoT">ID</div><div class="contInfoData contInfoData7">N° Orden</div><div class="contInfoData contInfoData7 infoT">Rut cliente</div><div class="contInfoData contInfoData7" infoT>Fecha venta</div><div class="contInfoData contInfoData7 infoT">Total a pagar</div><div class="contInfoData contInfoData7" infoT>Estado de perdido</div><div class="contInfoData contInfoData7 infoT">Opciones</div></div>');
    for (var i = 0; i < Object.keys(data).length; i++) {
        est = 'Activo';
        btn = '<button onclick="crearModalAcepto(\'Anular venta\',\'¿estas segur@ de querer anular esta venta?\',\'anularVenta(' + data[i].ID_BOL + ')\')">Anular venta</button>';
        if (data[i].EST_LOG_BOL == '2') {
            est = 'Enviado';
        } else if (data[i].EST_LOG_BOL == '0') {
            est = 'Anulado';
            btn = '<button onclick="crearModalAcepto(\'Deshacer anulacion\',\'¿estas segur@ de querer reincorporar esta venta?\',\'deshacerAnul(' + data[i].ID_BOL + ')\')">Deshacer</button>';
        }

        row = '<div class="row rows"><div class="contInfoData contInfoData7 tdId">' + data[i].ID_BOL + '</div><div class="contInfoData contInfoData7 tdOrden">' + data[i].ORDEN_BOL + ' </div><div class="contInfoData contInfoData7 tdRut">' + data[i].RUT_CLI + ' </div><div class="contInfoData contInfoData7 tdFech">' + data[i].FECH_BOL + '</div><div class="contInfoData contInfoData7">' + data[i].TOT_BOL + '</div><div class="contInfoData contInfoData7 tdEstado">' + est + '</div><div class="contInfoData contInfoData7"><button onclick="verDetalles(' + data[i].ID_BOL + ')">Ver detalles</button>' + btn + '</div></div>';
        $(".alignDatos").append(row);

    }
    let cont = 0;
    let rows = document.getElementsByClassName('rows');
    let estado = document.getElementsByClassName('tdEstado');

    for (var i = 0; i < rows.length; i++) {
        if (estado[i].innerText.includes("Activo")) {
            rows[i].style.display = 'flex';
            cont += 1;
        } else {
            rows[i].style.display = 'none';
        }
    }
    if (cont == 0) {
        $(".rowNone").remove();
        row = '<div class="row rowNone"><div class="contInfoData contInfoData1">No hay pedidos en estado "' + $(".selEsts").val() + '" </div></div>';
        $(".alignDatos").append(row);
    } else {
        $(".rowNone").remove();
    }
}


function filtrarVentas() {
    let cont = 0;
    let rows = document.getElementsByClassName('rows');
    let id = document.getElementsByClassName('tdId');
    let ord = document.getElementsByClassName('tdOrden');
    let rut = document.getElementsByClassName('tdRut');
    let fech = document.getElementsByClassName('tdFech');
    let estado = document.getElementsByClassName('tdEstado');

    for (var i = 0; i < rows.length; i++) {
        if ((id[i].innerText.includes($("#txtBuscar").val()) || ord[i].innerText.includes($("#txtBuscar").val()) || rut[i].innerText.includes($("#txtBuscar").val()) || fech[i].innerText.includes($("#txtBuscar").val())) && estado[i].innerText.includes($(".selEsts").val())) {
            rows[i].style.display = 'flex';
            cont += 1;
        } else {
            rows[i].style.display = 'none';
        }
    }
    if (cont == 0) {
        $(".rowNone").remove();
        row = '<div class="row rowNone"><div class="contInfoData contInfoData1">No se encontraron ventas</div></div>';
        $(".alignDatos").append(row);
    } else {
        $(".rowNone").remove();
    }

}

function verDetalles(idBol) {
    crearModalEspera();
    $.ajax({
        async: true,
        type: "POST",
        data: { "IdBoleta": idBol },
        url: "./ajax/verDetalles.php",
        success: function(datCerr) {
            //console.log(datCerr);
            if (datCerr == -2) {
                alert("No hay detalles asociados");
                cerrarModalEspera();
            } else if (/^[\],:{}\s]*$/.test(datCerr.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                //console.log("es json")
                data = JSON.parse(datCerr);
                modalDetalles(data)
                setTimeout(function() {
                    cerrarModalEspera();
                }, 200)
            }

        }
    });
}


function modalDetalles(data) {

    var container = '<div class="coverContAcep"><div class="ContAcepInfo ContAcepInfo2"><div class="alingContAc"></div></div></div>';
    var texto = '<h1>Detalles del pedido</h1><h3>Datos del cliente</h3>';
    texto += '<p class="textMensajeAcep">Rut: <span>' + data[0].RUT_CLI + '</span></p>';
    texto += '<p class="textMensajeAcep">Nombre: <span>' + data[0].NOM_CLI + ' ' + data[0].APE_CLI + '</span></p>';
    texto += '<p class="textMensajeAcep">Correo: <span>' + data[0].CORR_CLI + '</span></p>';
    texto += '<p class="textMensajeAcep">Telefono: <span>' + data[0].TEL_CLI + '</span></p>';
    texto += '<p class="textMensajeAcep">Direccion: <span>' + data[0].CALL1_DIR + ' #' + data[0].NUM_DIR;
    if (+data[0].VILLA_DIR != 'null') {
        texto += ', villa ' + data[0].VILLA_DIR;
    }
    if (+data[0].BLOCK_DIR != 'null') {
        texto += ', block ' + data[0].BLOCK_DIR;
    }
    texto += '</span></p>';
    texto += '<p class="textMensajeAcep">Comuna: <span>' + data[0].COMUNA_DIR + ' (region ' + data[0].NOM_REGION + ') </span></p>';

    texto += '</br><h3>Datos de la compra</h3>';
    texto += '<p class="textMensajeAcep">N° orden: <span>' + data[0].ORDEN_BOL + '</span></p>';
    texto += '<p class="textMensajeAcep">Fecha: <span>' + data[0].FECH_BOL + '</span></p>';
    texto += '<p class="textMensajeAcep">Metodo de pago: <span>' + data[0].NOM_METPAG + '</span></p>';
    texto += '<p class="textMensajeAcep">Cantidad de cerraduras: <span>' + data[0].CANT_PROD_BOL + '</span></p>';
    texto += '<p class="textMensajeAcep">Total a pagar: $<span>' + data[0].TOT_BOL + '</span></p>';
    texto += '</br><h3>Listado de cerraduras compradas</h3>';
    texto += '<div class="contListMod"><div class="listMod">';
    texto += '<div class="trListMod"><div class="tdListMod th"><span>Codigo</span></div><div class="tdListMod th"><span>Serial</span></div><div class="tdListMod th"><span>Estado</span></div></div>';
    let estado = 'Lista';
    let con = 0;
    for (var i = 1; i < data.length; i++) {
        if (data[i][0].EST_CERR == '4') {
            estado = 'Pendiente';
            con += 1;
        }
        texto += '<div class="trListMod"><div class="tdListMod"><span>' + data[i][0].COD_CERR + '</span></div><div class="tdListMod"><span>' + data[i][0].SERIAL_CERR + '</span></div><div class="tdListMod"><span>' + estado + '</span></div></div>';
    }



    texto += '</div></div>';
    var botones = '<div class="contBotnes"><button class="btnAcep btnAcep2" onclick="cerrarModalAcepto()">Cerrar</button>';
    if (con == 0) {
        if (data[0].EST_LOG_BOL == '2') {
            botones += '<button class="btnAcep btnAcep1" onclick="deshacerAnul(' + data[0].ID_BOL + ')">Revertir a estado anterior</button>'
        } else if (data[0].EST_LOG_BOL == '1') {
            botones += '<button class="btnAcep btnAcep1" onclick="confirmarEnvio(' + data[0].ID_BOL + ')">Establecer como enviado</button>'
        }
    }
    botones += '</div>'

    $("body").append(container);
    $(".alingContAc").append(texto);
    $(".alingContAc").append(botones);

}

function confirmarEnvio(idBol) {
    cerrarModalAcepto();
    crearModalEspera();
    eliminarModal();
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "IdBoleta": idBol },
        url: "./ajax/confirmarEnv.php",
        success: function(datCerr) {
            //console.log(datCerr);
            if (datCerr == 1) {
                verVentas();
                cerrarModalEspera();
            } else if (datCerr == -2) {
                alert("No hay ventas asociadas");
                cerrarModalEspera();
            }
        }
    });

}


function anularVenta(idBol) {
    cerrarModalAcepto();
    crearModalEspera();
    eliminarModal();
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "IdBoleta": idBol },
        url: "./ajax/anularVenta.php",
        success: function(datCerr) {
            //console.log(datCerr);
            if (datCerr == 1) {
                verVentas();
                cerrarModalEspera();
            } else if (datCerr == -2) {
                alert("No hay ventas asociadas");
                cerrarModalEspera();
            }
        }
    });

}

function deshacerAnul(idBol) {
    cerrarModalAcepto();
    crearModalEspera();
    eliminarModal();
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "IdBoleta": idBol },
        url: "./ajax/deshacerAnul.php",
        success: function(datCerr) {
            console.log(datCerr);
            if (datCerr == 1) {
                verVentas();
                cerrarModalEspera();
            } else if (datCerr == -2) {
                alert("No hay ventas asociadas");
                cerrarModalEspera();
            }
        }
    });

}






//TODO DE CERRADURAS


function verCerraduras() {
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "vent": 1 },
        url: "./ajax/listCerradura.php",
        success: function(datCerr) {
            //console.log(datCerr);

            if (datCerr == -2) {
                alert("No hay ventas asociadas");
                cerrarModalEspera();
            } else if (/^[\],:{}\s]*$/.test(datCerr.replace(/\\["\\\/bfnrtu]/g, '@').replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']').replace(/(?:^|:|,)(?:\s*\[)+/g, ''))) {
                //console.log("es json")
                data = JSON.parse(datCerr);
                crearModalListadoCerr(data)
                cerrarModalEspera();
            }
        }
    });
}

function crearModalListadoCerr(data) {
    //console.log(data);
    let est = '';
    let opc = '';
    let row = '';
    let fech = '';


    $("body").append('<div class="containerDatos"><div class="subContainerDatos"><div class="alignFiltros"></div></br><div class="alignDatos"><h3>Cerraduras:</h3></div></div></div>');
    $(".alignFiltros").append('<label class="lblFlitros">Estado de cerraduras:</label><select class="selEsts" onchange="filtrarCerraduras()"><option value="Pendiente">Pendientes</option><option value="Armada">Armadas</option><option value="Activa">Activas</option><option value="Bloqueada">Bloqueadas</option></select><label class="lblFlitros">Buscar:</label><input type="text" id="txtBuscar" maxlength="20" onkeyup="filtrarCerraduras()" placeholder="id, serial, fecha">');
    $(".alignDatos").append('<div class="row"><div class="contInfoData contInfoData5 infoT">ID</div><div class="contInfoData contInfoData5">Serial</div><div class="contInfoData contInfoData5 infoT">Fecha ultima actualizacion</div><div class="contInfoData contInfoData5">Estado actual</div><div class="contInfoData contInfoData5 infoT">Opciones</div></div>');
    for (var i = 0; i < Object.keys(data).length; i++) {
        est = 'Activa';
        fech = 'Ninguna actividad registrada';
        opc = 'Ninguna disponible';

        if (data[i].DATE_CERR != null) {
            fech = data[i].DATE_CERR;
        }
        if (data[i].EST_CERR == '3') {
            est = 'Armada';
            opc = '<button onclick="verCredenciales(\'' + data[i].SERIAL_CERR + '\',\'' + data[i].PASS_CERR + '\',\'' + data[i].SSID_RED + '\',\'' + data[i].PASS_RED + '\')">Ver credenciales</button>';
            opc += '<button onclick="crearModalAcepto(\'Revertir confirmacion\',\'¿estas segur@ de querer revertir esta cerradura a su estado anterior?\',\'reverConfirCerr(' + data[i].COD_CERR + ')\')">Revertir confirmacion</button>';
        } else if (data[i].EST_CERR == '4') {
            est = 'Pendiente';
            opc = '<button onclick="verCredenciales(\'' + data[i].SERIAL_CERR + '\',\'' + data[i].PASS_CERR + '\',\'' + data[i].SSID_RED + '\',\'' + data[i].PASS_RED + '\')">Ver credenciales</button>';
            opc += '<button onclick="crearModalAcepto(\'Confirmar cerradura\',\'¿estas segur@ de querer confirmar esta cerradura para ser enviada?\',\'confirmarCerr(' + data[i].COD_CERR + ')\')">Confirmar cerradura</button>';
        } else if (data[i].EST_CERR == '0') {
            est = 'Bloqueada';
        }
        row = '<div class="row rows"><div class="contInfoData contInfoData5 tdCod">' + data[i].COD_CERR + '</div><div class="contInfoData contInfoData5 tdSerial">' + data[i].SERIAL_CERR + ' </div><div class="contInfoData contInfoData5 tdFech">' + fech + '</div><div class="contInfoData contInfoData5 tdEstado">' + est + '</div><div class="contInfoData contInfoData5">' + opc + '</div></div>';
        $(".alignDatos").append(row);
    }
    let cont = 0;
    let rows = document.getElementsByClassName('rows');
    let estado = document.getElementsByClassName('tdEstado');
    //alert(rows.length);//cantidad de registros
    for (var i = 0; i < rows.length; i++) {
        if (estado[i].innerText.includes("Pendiente")) {
            rows[i].style.display = 'flex';
            cont += 1;
        } else {
            rows[i].style.display = 'none';
        }
    }
    if (cont == 0) {
        $(".rowNone").remove();
        row = '<div class="row rowNone"><div class="contInfoData contInfoData1">No hay cerraduras en estado "' + $(".selEsts").val() + '" </div></div>';
        $(".alignDatos").append(row);
    } else {
        $(".rowNone").remove();
    }
}



function filtrarCerraduras() {
    let cont = 0;
    let rows = document.getElementsByClassName('rows');
    let cod = document.getElementsByClassName('tdCod');
    let ser = document.getElementsByClassName('tdSerial');
    let fech = document.getElementsByClassName('tdFech');
    let estado = document.getElementsByClassName('tdEstado');

    for (var i = 0; i < rows.length; i++) {
        if ((cod[i].innerText.includes($("#txtBuscar").val()) || ser[i].innerText.includes($("#txtBuscar").val()) || fech[i].innerText.includes($("#txtBuscar").val())) && estado[i].innerText.includes($(".selEsts").val())) {
            rows[i].style.display = 'flex';
            cont += 1;
        } else {
            rows[i].style.display = 'none';
        }
    }
    if (cont == 0) {
        $(".rowNone").remove();
        row = '<div class="row rowNone"><div class="contInfoData contInfoData1">No se encontraron cerraduras</div></div>';
        $(".alignDatos").append(row);
    } else {
        $(".rowNone").remove();
    }

}

function confirmarCerr(idCerr) {
    cerrarModalAcepto();
    crearModalEspera();
    eliminarModal();
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "IdCerr": idCerr },
        url: "./ajax/confirmarCerr.php",
        success: function(datCerr) {
            console.log(datCerr);
            if (datCerr == 1) {
                verCerraduras();
                cerrarModalEspera();
            } else if (datCerr == -2) {
                alert("error");
                cerrarModalEspera();
            }
        }
    });

}


function reverConfirCerr(idCerr) {
    cerrarModalAcepto();
    crearModalEspera();
    eliminarModal();
    $.ajaxPrefilter(function(options, original_Options, jqXHR) {
        options.async = true;
    });
    $.ajax({
        async: true,
        type: "POST",
        data: { "IdCerr": idCerr },
        url: "./ajax/reverConfirCerr.php",
        success: function(datCerr) {
            console.log(datCerr);
            if (datCerr == 1) {
                verCerraduras();
                cerrarModalEspera();
            } else if (datCerr == -2) {
                alert("error");
                cerrarModalEspera();
            } else if (datCerr == -3) {
                alert("No se puede revertir una cerradura ya enviada...");
                verCerraduras();
                cerrarModalEspera();
            }
        }
    });

}



function verCredenciales(serial, passNum, ssidWifi, passWifi) {

    var container = '<div class="coverContAcep"><div class="ContAcepInfo"><div class="alingContAc"></div></div></div>';
    var texto = '<h1>' + serial + '</h1><p class="textMensajeAcep">Contraseña numerica: ' + passNum + '</p></br>';
    texto += '<p class="textMensajeAcep">SSID: ' + ssidWifi + '</p>';
    texto += '<p class="textMensajeAcep">Pass Wifi: ' + passWifi + '</p>';
    var botones = '<div class="contBotnes"><button class="btnAcep btnAcep2" onclick="cerrarModalAcepto()">Cerrar</button></div>'

    $("body").append(container);
    $(".alingContAc").append(texto);
    $(".alingContAc").append(botones);

}