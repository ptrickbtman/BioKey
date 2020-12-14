<?php

include '../controller/cerraduraBD.php';
session_start();

if(isset($_POST["idC"]) && isset($_SESSION["usuario"]) ){
    $id = $_POST["idC"];
    $user = $_SESSION["usuario"];
    //print_r( $user);
    $cerradura = new cerraduraBD($id, null, null, null, null, null, null, null);
    $cerradura->set_id_usuario_cerradura($user[0]);
    if($cerradura->desbloquear()){
        //print_r($cerradura);
        echo 1;
    }else{
        echo -1;
    }
}   


?>