<?php  
include '../controller/regionBD.php';
include '../controller/ciudadBD.php';
if ( isset($_POST['regisData']) ) {
	session_start();
	$_SESSION["cliente"] = $_POST['regisData'];
	$_SESSION["cliente"]['preUnitFC'] = 90000;
	$_SESSION["cliente"]['preTotFC'] = intval($_SESSION["cliente"]['preUnitFC'])*intval($_SESSION["cliente"]['cantiFC']);
	$_SESSION["cliente"]['idMetPagFC'] = null;
	$obj = new regionBD($_SESSION["cliente"]['regFC'],null, null);
	$_SESSION["cliente"]['nomRegFC'] = $obj->buscarRegionId();
	$_SESSION["cliente"]['nomCiuFC'] = null;


	echo "1";

}else{
	echo "-1";
}
?>