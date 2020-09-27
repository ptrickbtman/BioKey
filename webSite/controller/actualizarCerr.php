<?php  
if (isset($_GET["idc"])){
	include 'cerradura.php';
	$con = conexion();
	date_default_timezone_set("America/Santiago");
	$fecha_act = date("d-m-Y G:i");
	$cerradura = new cerraduraBD($_GET["idc"], null, null, $fecha_act, null);
	

	echo "-0#".$cerradura->actualizarCerradura($_GET["idc"])."#0-";
}else{
	echo "-0#error#0-";
}
?>