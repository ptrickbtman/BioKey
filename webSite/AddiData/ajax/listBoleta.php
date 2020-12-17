<?php

include '../controller/boletaBD.php';
session_start();

if(isset($_POST["boletas"]) && $_SESSION["usuario"][4]==2 ){
    $boleta = new boletaBD(null,null,null,null,null,null,null,null);
    print_r ($boleta->verAllBoletas());
}

if(isset($_POST["filterIdBoleta"]) && $_SESSION["usuario"][4]==2 ){
    $id = $_POST["filterIdBoleta"];
    $boleta = new boletaBD($id,null,null,null,null,null,null,null);
    print_r ($boleta->verAIdBoletas());
    //print_r($boleta);
}

?>