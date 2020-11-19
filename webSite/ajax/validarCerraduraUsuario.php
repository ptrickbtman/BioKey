<?php
include "../controller/cerraduraBD.php";
session_start();

if($_POST["serial"] && !empty($_POST["serial"]) && isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"])){
    
    $user = $_SESSION["usuario"];

    $token = $_POST["serial"];
    $cerradura = new cerraduraBD (null,null,null,null,null,null,null,null);
    $cerradura->set_serial_cerradura($token);
    if($cerradura->buscarCerraduraSerialValidar()){
        $cerradura->set_id_usuario_cerradura($user[0]);
        if($cerradura->validarCerraduraPorId()){
            $user[0] = 4;
            $user[4] = 1;
            $_SESSION["usuario"]=  $user;
            echo 1; // actualizada correctamente
        }else{
            echo -1;// cerradura ya actualizada
        }
    }else{
        echo -2; // No se encontro cerradura
    }
}
?>
