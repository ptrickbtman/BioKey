<?php 

if (isset($_POST['idC'])) { //if para validar variable de sesion
	
	$IDC = $_POST['idC'];

	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" >
		<title>Gestionar cerradura</title>
		<script src="js/jquery.js"></script>
		<script src="js/gestionarCerradura.js"></script>
	</head>
	<style>

	</style>
	<body>
		<div class="contP">
			<h1>Gestionar cerradura <span id="serGes"></span></h1>
			<form class="formNPass">	
				<h3>Cambiar contraseña cerradura (numerica)</h3>

				<br>

				<span>Ingrese nueva coontraseña: </span>				
				<input type="text" name="NPass" required="" maxlength="6">

				<br>

				<span>Repita nueva coontraseña: </span>
				<input type="text" name="RNPass" required="" maxlength="6">


				<br>

				<input type="hidden" name="idC" id="idC" value="<?php echo $IDC; ?>">
				<input type="hidden" name="idOp" value="1">
				<input type="button" name="btn" value="Actualizar contraseña" onclick="updateCerr('formNPass')">



			</form>
			<form class="formNWifi">
				
				<br>
				
				<h3>Cambiar red WiFi de cerradura</h3>


				<br>	


				<span>Ingrese nueva SSID: </span>
				<input type="text" name="NSsid" required="" maxlength="30">
				<span>SSID actual: </span><span id="ssidActGes"></span>

				<br>

				<span>Ingrese nueva coontraseña de Wifi: </span>
				<input type="text" name="NWFPass" required="" maxlength="30">

				<br>

				<input type="hidden" name="idC" value="<?php echo $IDC; ?>">
				<input type="hidden" name="idOp" value="2">
				<input type="button" name="btn" value="Actualizar red" onclick="updateCerr('formNWifi')">



			</form>
		</div>
	</body>
	</html>
	<?php  
}else{
	echo "Error";
}

?>