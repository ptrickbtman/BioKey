<?php

include '../controller/ventaBD.php';

session_start();
//print_r($_SESSION["usuario"]);
//echo $_SESSION["usuario"][4];
//echo $_POST["vent"];

if(isset($_POST["vent"]) && $_SESSION["usuario"][4]==2){
    $objVenta = new ventaBD(null, null,null,null,null);
    print_r( $objVenta->allVentas());
}

?>