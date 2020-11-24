<?php  
include '../controller/clienteBD.php';
if ( isset($_POST['idMetPag']) ) {
	session_start();
	$_SESSION["cliente"]['idMetPagFC'] = $_POST['idMetPag'];
	echo "1";

}else{
	echo "-1";
}
?>