//nombre del formularios


function vacio(data) {
    if (data == null || data.length == 0 || /^\s+$/.test(data)) {
        return false;
    }
    return true;
}


function validarEmail(email) {
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(email)) {
        return true;
    } else {
        return false;
    }
}


function validarTextoMasNum(valor) {
    if (/\d/.test(valor)) {
        return true;
    }
    return false;

}