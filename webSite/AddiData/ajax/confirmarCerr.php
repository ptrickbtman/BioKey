<?php

include '../controller/cerraduraBD.php';

session_start();
//print_r($_SESSION["usuario"]);
//echo $_SESSION["usuario"][4];
//echo $_POST["vent"];

if(isset($_POST["IdCerr"]) && $_SESSION["usuario"][4]==2){
    $obj = new cerraduraBD($_POST['IdCerr'], null, null, null, null, null, null, null);
    echo $obj->confirmarCerr();
}else{
	echo -3;
}

?>