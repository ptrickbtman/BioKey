<?php  
include '../controller/clienteBD.php';
if ( isset($_POST['datosVenta']) ) {
	session_start();
	$cliente = new clienteBD($_POST['datosVenta']['rutFC'],$_POST['datosVenta']['nomFC'],$_POST['datosVenta']['apeFC'],$_POST['datosVenta']['corFC'],$_POST['datosVenta']['telFC'], 1);
	echo $cliente->insertarClienteVenta();
	print_r($_POST['datosVenta']);
	//echo "1";

}else{
	echo "-1";
}
?>