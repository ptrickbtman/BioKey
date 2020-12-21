<?php  
if (isset($_GET["idc"])){
	include 'cerraduraBD.php';
	include 'registroCerrBd.php';
	date_default_timezone_set("America/Santiago");
	$fecha_act = date("d-m-Y G:i");
	$obj = new cerraduraBD($_GET["idc"], null, null, null, $fecha_act, null, null, null);
	if ($obj->actualizarFecha()) {
		$obj = new registroCerrBD(null, $_GET["idc"], $_GET["idt"], null, $fecha_act, null);
		echo "-0#".$obj->agregarRegistro()."#0-";
		//print_r($obj);
	}
	
}else{
	echo "-0#error#0-";
}
?>