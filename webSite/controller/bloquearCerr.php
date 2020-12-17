<?php  
if (isset($_GET["idc"])){
	include 'cerraduraBD.php';
	date_default_timezone_set("America/Santiago");
	$fecha_act = date("d-m-Y G:i");
	$obj = new cerraduraBD($_GET["idc"], null, null, null, $fecha_act, null, null, null);
	if ($obj->actualizarFecha()) {
		$obj->bloquear();
	}else{
		echo "-0#error#0-";
	}
	
}else{
	echo "-0#error#0-";
}
?>