<?php

function validarLetras($datos) {
    if (ctype_alpha($datos)) {
        return True;            
    } else {
        return False;
    }
}

function validarNum($data){
    if (ctype_digit($data)) {
        return True;
    } else {
        return False;
    }
}

function  validarEmail($data) {
    if (filter_var($data, FILTER_VALIDATE_EMAIL)) {
        return True;
    }else {
        return False;
    }
}

?>