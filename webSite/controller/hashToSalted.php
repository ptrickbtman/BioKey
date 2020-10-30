<?php

function hashData($data){
    $hash_variable_salt = password_hash($data,PASSWORD_DEFAULT, array('cost' => 9)); 
    return $hash_variable_salt; 
}

function hashVerify($hash , $pass){
    if( crypt($pass, $hash)==$hash){
        return True;
    }else{
        return False;
    }
}



?>