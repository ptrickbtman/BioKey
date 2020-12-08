<?php

include '../controller/ventaBD.php';

session_start();

if(isset($_POST["pedidos"]) && $_SESSION["usuario"][4]==2){
    $objVenta = new ventaBD(null, null,null,null,null);
    print_r( $objVenta->allVentas());
}

?>