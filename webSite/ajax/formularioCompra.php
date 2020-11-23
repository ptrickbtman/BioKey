<?php  
include '../controller/clienteBD.php';
if ( isset($_POST['regisData']) ) {
	session_start();
	$datos = $_POST['regisData'];
	$_SESSION["cliente"] = $datos;
	$_SESSION["cliente"]['preUnitFC'] = 90000;
	$_SESSION["cliente"]['preTotFC'] = intval($_SESSION["cliente"]['preUnitFC'])*intval($_SESSION["cliente"]['cantiFC']);
	$_SESSION["cliente"]['idMetPagFC'] = null;
	echo "1";

}else{
	echo "-1";
}
?>