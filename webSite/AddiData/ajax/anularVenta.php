<?php

include '../controller/boletaBD.php';

session_start();
//print_r($_SESSION["usuario"]);
//echo $_SESSION["usuario"][4];
//echo $_POST["vent"];

if(isset($_POST["IdBoleta"]) && $_SESSION["usuario"][4]==2){
    $obj = new boletaBD($_POST['IdBoleta'] , null , null, null , null , null ,null, null);
    echo $obj->anularVenta();
}

?>
