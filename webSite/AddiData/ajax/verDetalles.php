<?php

include '../controller/boletaBD.php';

session_start();

if(isset($_POST["IdBoleta"]) && $_SESSION["usuario"][4]==2){
    $obj = new boletaBD(null , null , null, null , null , null ,null, null);
    print_r( $obj->verAllBoletas());
}

?>