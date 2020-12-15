<?php  
include '../controller/clienteBD.php';
if ( isset($_POST['idMetPagFC']) ) {
	session_start();
	$_SESSION["cliente"]['idMetPagFC'] = $_POST['idMetPagFC'];
	$_SESSION["cliente"]['nomMetPagFC'] = $_POST['nomMetPagFC'];
	echo "1";

}else{
	echo "-1";
}
?>