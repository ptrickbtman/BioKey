<?php  
if (isset($_GET["idc"])){
	include 'registroCerrBd.php';
	$con = conexion();
	date_default_timezone_set("America/Santiago");
	$fecha_act = date("d-m-Y G:i");
	$registro = new registroCerrBD(null, $_GET["idc"], $_GET["idt"], null, $fecha_act, null);
	echo "-0#".$registro->agregarRegistro()."#0-";
}else{
	echo "-0#error#0-";
}
?>