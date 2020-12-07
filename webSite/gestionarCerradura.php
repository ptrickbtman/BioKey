<?php 
session_start();
if (isset($_POST['idC']) && isset($_SESSION['usuario'])) { //if para validar variable de sesion
	
	$IDC = $_POST['idC'];

	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Gestionar cerradura</title>

		<link rel="stylesheet" href="css/menu.css">
		<link rel="stylesheet" href="css/gestionarCerradura.css">
		<script src="js/jquery.js"></script>
		<script src="js/particles.js"></script>
		<script src="js/gestionarCerradura.js"></script>
		<script src="js/validacion.js"></script>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>

	</head>
	<style>

	</style>
	<body>

		<?php
		include "view/menu.php";

        //session_destroy();
		menu();

		?>

		<div id="particles-js"></div>

		<div class="contP">
			<div class="formNPass">
				<h1>Gestionar cerradura <span id="serGes"></span></h1>
				<button class="atras">Atras</button><button class="btnRegis">Ver registros</button><button class="desasociar">Desasociar</button>
			</div>

			<form class="formNPass">	

				<h3>Cambiar contraseña cerradura (numerica)</h3>

				<span class="lblGes1">Ingrese nueva coontraseña: <span class="lblGes1" id="spanGes1"></span></span>				
				<input class="inputTxt" class="inputTxt" type="password" name="NPass" id="NPass" maxlength="6" placeholder="XXXXXXX">



				<span class="lblGes2">Repita nueva coontraseña: <span class="lblGes2" id="spanGes2"></span></span>
				<input class="inputTxt" type="password" name="RNPass" id="RNPass" id="RNPass" maxlength="6" placeholder="XXXXXXX">



				
				<input type="hidden" name="idC" id="idC" value="<?php echo $IDC; ?>">
				<input type="hidden" name="idOp" value="1">
				<input class="btnAct" type="button" name="btn" value="Actualizar contraseña" onclick="updateCerr('formNPass')">



			</form>
			<form class="formNWifi">
				
				
				
				<h3>Cambiar red WiFi de cerradura</h3>





				<span class="lblGes3">Ingrese nueva SSID: <span class="lblGes3" id="spanGes3">(SSID actual: <span class="lblGes3" id="ssidActGes"></span>)</span></span>
				<input placeholder="XXXXXXX" class="inputTxt" type="text" name="NSsid" id="NSsid" maxlength="30">
				

				

				<span class="lblGes4">Ingrese nueva coontraseña de Wifi: <span class="lblGes4" id="spanGes4"></span></span>
				<input placeholder="XXXXXXX" class="inputTxt" type="text" name="NWFPass" id="NWFPass" maxlength="30">

				

				<input type="hidden" name="idC" value="<?php echo $IDC; ?>">
				<input type="hidden" name="idOp" value="2">
				<input class="btnAct" type="button" name="btn" value="Actualizar red" onclick="updateCerr('formNWifi')">



			</form>
		</div>


	</body>
	<script src="js/menu.js"></script>
	</html>
	<?php  
}else{
	header("Location:index.php");
}

?>