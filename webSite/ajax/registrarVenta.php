<?php  
include '../controller/clienteBD.php';
include '../controller/boletaBD.php';
include '../controller/direccionBD.php';
include '../controller/cerraduraBD.php';
include '../controller/generarGodigo.php';

if ( isset($_POST['datosVenta']) ) {
	print_r($_POST['datosVenta']);
	session_start();
	$respuesta = 1;
	$obj = new clienteBD($_POST['datosVenta']['rutFC'],$_POST['datosVenta']['nomFC'],$_POST['datosVenta']['apeFC'],$_POST['datosVenta']['corFC'],$_POST['datosVenta']['telFC'], 1);
	$respuesta = $obj->insertarClienteVenta();
	if ($respuesta == 0) {
		$respuesta = $obj->updateClienteVenta();
	}
	if ($respuesta == 1) {
		date_default_timezone_set("America/Santiago");
		$fecha_act = date("d-m-Y G:i");
		$obj = new boletaBD(null , $_POST['datosVenta']['idMetPagFC'] , $_POST['datosVenta']['cantiFC'], $_POST['datosVenta']['ordFC'] , $_POST['datosVenta']['preTotFC'] , $fecha_act, $_POST['datosVenta']['rutFC'], 1);
		$respuesta = $obj->insertarBoleta();
	}
	$idBol = $respuesta;
	if ($respuesta >= 0) {
		$obj = new direccionBD(null,$idBol,$_POST['datosVenta']['regFC'],$_POST['datosVenta']['ciuFC'], $_POST['datosVenta']['comFC'],$_POST['datosVenta']['call1FC'],$_POST['datosVenta']['call2FC'],$_POST['datosVenta']['numFC'],$_POST['datosVenta']['villFC'],$_POST['datosVenta']['blockFC'], 1);
		$respuesta = $obj->insertarDireccion();
	}
	if ($respuesta == 1) {

		for ($i=0; $i <count(intval($_POST['datosVenta']['cantiFC'])) ; $i++) { 
			$obj = new cerraduraBD(null, null, generarCodigo(), null, null, 4,null, null);
			$respuesta = $obj->crearPedidoCerradura();
			$obj = new cerraduraBD(null, null, generarCodigo(), null, null, 4,null, null);
			$respuesta = $obj->crearPedidoCerradura();
		}
		
	}
	echo $respuesta;
	

}else{
	echo "-1";
}
?>