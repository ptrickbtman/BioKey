<?php

include '../controller/boletaBD.php';
session_start();

if(isset($_POST["boletas"]) && $_SESSION["usuario"][4]==2 ){
    $boleta = new boletaBD(null,null,null,null,null,null,null,null);
    print_r ($boleta->verAllBoletas());
}

?>