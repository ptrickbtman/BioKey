<?php

include '../controller/cerraduraBD.php';

session_start();

if(isset($_POST["idC"]) && isset($_SESSION["usuario"])){
    $idC = $_POST["idC"];
    $user = $_SESSION["usuario"];
    $cerradura = new cerraduraBD($idC, $user[0], null, null, null, null,null, null);
    print_r($cerradura);




}else{
    echo -1;
}

?>