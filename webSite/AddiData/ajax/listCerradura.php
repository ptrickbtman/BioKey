<?php

include '../controller/cerraduraBD.php';

session_start();
//print_r($_SESSION["usuario"]);
//echo $_SESSION["usuario"][4];
//echo $_POST["vent"];

if(isset($_POST["vent"]) && $_SESSION["usuario"][4]==2){
    $obj = new cerraduraBD(null , null , null, null , null , null ,null, null);
    print_r( $obj->verAllCerraduras());
}

?>
