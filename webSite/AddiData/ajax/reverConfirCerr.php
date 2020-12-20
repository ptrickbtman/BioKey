<?php

include '../controller/cerraduraBD.php';
include '../controller/ventaBD.php';
include '../controller/boletaBD.php';

session_start();
//print_r($_SESSION["usuario"]);
//echo $_SESSION["usuario"][4];
//echo $_POST["vent"];

if(isset($_POST["IdCerr"]) && $_SESSION["usuario"][4]==2){
	$obj = new ventaBD(null, $_POST['IdCerr'], null ,null,null);
	$json= $obj->valEstadoVen();

	$obj = new boletaBD($json[0]->ID_BOL , null , null, null , null , null ,null, null);
	$json= $obj->verAIdBoletas();

	if ($json[0]->EST_LOG_BOL!='2') {
		$obj = new cerraduraBD($_POST['IdCerr'], null, null, null, null, null, null, null);
		echo $obj->revertirConfirCerr();
	}else{
		echo -3;
	}
}else{
	echo -2;
}

?>