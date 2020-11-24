<?php  
include 'cerraduraBD.php';

if (isset($_GET["idc"])){
	date_default_timezone_set("America/Santiago");
	$fecha_act = date("d-m-Y G:i");
	$cerradura = new cerraduraBD($_GET["idc"], null, null, null, $fecha_act, null, null, null);
	echo "-0#".$cerradura->actualizarCerradura()."#0-";
	
}else{
	echo "-0#error#0-";
}
?>