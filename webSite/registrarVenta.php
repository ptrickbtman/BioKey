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
		<title>cargando...</title>
		<script src="js/jquery.js"></script>
		<script src="js/registrarVenta.js"></script>
	</head>
	<body>
		<form class="datosCompra">
			<input type="text" name="ordFC" value="<?php echo $nOrden; ?>" >
			<input type="text" name="rutFC" value="<?php echo $_SESSION['cliente']['rutFC']; ?>" >
			<input type="text" name="nomFC" value="<?php echo $_SESSION['cliente']['nomFC']; ?>" >
			<input type="text" name="apeFC" value="<?php echo $_SESSION['cliente']['apeFC']; ?>" >
			<input type="text" name="corFC" value="<?php echo $_SESSION['cliente']['corFC']; ?>" >
			<input type="text" name="telFC" value="<?php echo $_SESSION['cliente']['telFC']; ?>" >
			<input type="text" name="regFC" value="<?php echo $_SESSION['cliente']['regFC']; ?>" >
			<input type="text" name="ciuFC" value="<?php echo $_SESSION['cliente']['ciuFC']; ?>" >
			<input type="text" name="comFC" value="<?php echo $_SESSION['cliente']['comFC']; ?>" >
			<input type="text" name="call1FC" value="<?php echo $_SESSION['cliente']['call1FC']; ?>" >
			<input type="text" name="call2FC" value="<?php echo $_SESSION['cliente']['call2FC']; ?>" >
			<input type="text" name="numFC" value="<?php echo $_SESSION['cliente']['numFC']; ?>" >
			<input type="text" name="villFC" value="<?php echo $_SESSION['cliente']['villFC']; ?>" >
			<input type="text" name="blockFC" value="<?php echo $_SESSION['cliente']['blockFC']; ?>" >
			<input type="text" name="cantiFC" value="<?php echo $_SESSION['cliente']['cantiFC']; ?>" >
			<input type="text" name="preUnitFC" value="<?php echo $_SESSION['cliente']['preUnitFC']; ?>" >
			<input type="text" name="preTotFC" value="<?php echo $_SESSION['cliente']['preTotFC']; ?>" >
			<input type="text" name="idMetPagFC" value="<?php echo $_SESSION['cliente']['idMetPagFC']; ?>" >
			
		</form>
	</body>
	</html>
	<?php
}else{
	echo "error";
}
?>