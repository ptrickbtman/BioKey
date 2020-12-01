<?php  
$nOrden="";
if (isset($_GET['collection_id']) && !empty($_GET['collection_id'])) {
	$nOrden= $_GET['collection_id'];
}
if (isset($_GET['payment_id']) && !empty($_GET['payment_id'])) {
	$nOrden= $_GET['payment_id'];
}


if ($nOrden!="") {
session_start();


	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>procesando...</title>
		<script src="js/jquery.js"></script>
		<script src="js/registrarVenta.js"></script>
	</head>
	<body>
		<form class="datosCompra">
		<?php // print_r($_SESSION["cliente"]) ?>
			<input type="hidden" name="ordFC" value="<?php echo $nOrden; ?>" >
			<input type="hidden" name="rutFC" value="<?php echo $_SESSION['cliente']['rutFC']; ?>" >
			<input type="hidden" name="nomFC" value="<?php echo $_SESSION['cliente']['nomFC']; ?>" >
			<input type="hidden" name="apeFC" value="<?php echo $_SESSION['cliente']['apeFC']; ?>" >
			<input type="hidden" name="corFC" value="<?php echo $_SESSION['cliente']['corFC']; ?>" >
			<input type="hidden" name="telFC" value="<?php echo $_SESSION['cliente']['telFC']; ?>" >
			<input type="hidden" name="regFC" value="<?php echo $_SESSION['cliente']['regFC']; ?>" >
			<input type="hidden" name="ciuFC" value="<?php echo $_SESSION['cliente']['ciuFC']; ?>" >
			<input type="hidden" name="comFC" value="<?php echo $_SESSION['cliente']['comFC']; ?>" >
			<input type="hidden" name="call1FC" value="<?php echo $_SESSION['cliente']['call1FC']; ?>" >
			<input type="hidden" name="call2FC" value="<?php echo $_SESSION['cliente']['call2FC']; ?>" >
			<input type="hidden" name="numFC" value="<?php echo $_SESSION['cliente']['numFC']; ?>" >
			<input type="hidden" name="villFC" value="<?php echo $_SESSION['cliente']['villFC']; ?>" >
			<input type="hidden" name="blockFC" value="<?php echo $_SESSION['cliente']['blockFC']; ?>" >
			<input type="hidden" name="cantiFC" value="<?php echo $_SESSION['cliente']['cantiFC']; ?>" >
			<input type="hidden" name="preUnitFC" value="<?php echo $_SESSION['cliente']['preUnitFC']; ?>" >
			<input type="hidden" name="preTotFC" value="<?php echo $_SESSION['cliente']['preTotFC']; ?>" >
			<input type="hidden" name="idMetPagFC" value="<?php echo $_SESSION['cliente']['idMetPagFC']; ?>" >
			
		</form>
		
		<!-- 
		aqui va el modal de carga solamente	
		-->

	</body>	
	</html>
	<?php
}else{
	echo '<script language="javascript">window.location.href = "formularioCompra.php";</script>';
	
}
?>