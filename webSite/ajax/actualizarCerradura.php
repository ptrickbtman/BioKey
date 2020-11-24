<?php  
if (isset($_POST['datosForm'])) {
	include '../controller/cerraduraBD.php';
	date_default_timezone_set("America/Santiago");
	$fecha_act = date("d-m-Y G:i");

	if ($_POST['datosForm']['idOp']==1){

		$cerradura = new cerraduraBD($_POST['datosForm']["idC"], null, null, $_POST['datosForm']["NPass"], $fecha_act, null, null, null);
		echo $cerradura->updateContraseñaCerr();

	}elseif ($_POST['datosForm']['idOp']==2){

		$cerradura = new cerraduraBD($_POST['datosForm']["idC"], null, null, null, $fecha_act, null, $_POST['datosForm']["NSsid"], $_POST['datosForm']["NWFPass"]);
		echo $cerradura->updateRedCerr();

	}
}
?>