<?php  
include 'controller/cerraduraBD.php';
date_default_timezone_set("America/Santiago");
$fecha_act = date("d-m-Y G:i");
if (isset($_GET["idc"])){
	
	$con = conexion();
	$cerradura = new cerraduraBD($_GET["idc"], null, null, null, $fecha_act, null, null, null);
	

	echo "-0#".$cerradura->actualizarCerradura()."#0-";
}elseif ($_POST["btn"]=="Actualizar contraseña"){
	$con = conexion();
	$cerradura = new cerraduraBD($_POST["idC"], null, null, $_POST["NPass"], $fecha_act, null, null, null);
	if ($cerradura->updateContraseñaCerr()) {
		echo '<script language="javascript">alert("Contraseña actualizada correctamente.");</script>';
		echo '<script language="javascript">location.href="tusCerraduras.php";</script>';
	}else{
		echo '<script language="javascript">alert("Error al actualizar contraseña.");</script>';
		echo '<script language="javascript">history.back();</script>';
	}

}elseif ($_POST["btn"]=="Actualizar red"){
	$con = conexion();
	$cerradura = new cerraduraBD($_POST["idC"], null, null, null, $fecha_act, null, $_POST["NSsid"], $_POST["NWFPass"]);
	if ($cerradura->updateRedCerr()) {
		echo '<script language="javascript">alert("Red WiFi actualizada correctamente.");</script>';
		echo '<script language="javascript">location.href="tusCerraduras.php";</script>';
	}else{
		echo '<script language="javascript">alert("Error al actualizar red WiFi.");</script>';
		echo '<script language="javascript">history.back();</script>';
	}
}else{
	echo "-0#error#0-";
}
?>