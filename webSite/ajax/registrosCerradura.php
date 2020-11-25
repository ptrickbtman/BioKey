<?php

include '../controller/cerraduraBD.php';
include '../controller/registroCerrBd.php';

session_start();

if(isset($_POST["idC"]) && isset($_SESSION["usuario"])){
    $idC = $_POST["idC"];
    $user = $_SESSION["usuario"];
    $cerradura = new cerraduraBD($idC, $user[0], null, null, null, null,null, null);
    //print_r($cerradura);
    if($cerradura->buscarCerraduraPorIds()){
            $registroCerradura = new registroCerrBD(null,$idC,null,null,null,null);
            $json = $registroCerradura->obtenerRegistrosPorIdCerradura();
            print_r($registroCerradura);
            print_r($json);
            

    }else{
        echo -2;
    }
}else{
    echo -1;
}

?>