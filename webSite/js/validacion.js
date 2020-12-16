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
function validarNumero(valor) {
    if (/^[0-9]+$/.test(valor)) {
        return true;
    }
    return false;

}


function validarRut(rut) {
    var respu = null;
    var valor = rut.replace('.','');
    valor = valor.replace('-','');


    
    cuerpo = valor.slice(0,-1);
    dv = valor.slice(-1).toUpperCase();
    
    

    if(cuerpo.length < 7) { 
       respu = false;
    }
    
    suma = 0;
    multiplo = 2;
    

    for(i=1;i<=cuerpo.length;i++) {

        index = multiplo * valor.charAt(cuerpo.length - i);
        
        suma = suma + index;
        
        if(multiplo < 7) { 
            multiplo = multiplo + 1; 
        } else { 
            multiplo = 2; 
        }

    }
    
    dvEsperado = 11 - (suma % 11);
    
    dv = (dv == 'K')?10:dv;
    dv = (dv == 0)?11:dv;
    
    
    if(dvEsperado != dv) { 
        respu = false; 
    }else{
        respu = true;
    }

   return respu;
}