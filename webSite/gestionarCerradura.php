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
			
			<form class="formNPass">	
				<h1>Gestionar cerradura <span id="serGes"></span></h1>
				<h3>Cambiar contraseña cerradura (numerica)</h3>

			

				<span>Ingrese nueva coontraseña: </span>				
				<input class="inputTxt" class="inputTxt" type="text" name="NPass" required="" maxlength="6" placeholder="XXXXXXX">

			

				<span>Repita nueva coontraseña: </span>
				<input placeholder="XXXXXXX" class="inputTxt" type="text" name="RNPass" required="" maxlength="6" placeholder="*******">


			

				<input type="hidden" name="idC" id="idC" value="<?php echo $IDC; ?>">
				<input type="hidden" name="idOp" value="1">
				<input class="btnAct" type="button" name="btn" value="Actualizar contraseña" onclick="updateCerr('formNPass')">



			</form>
			<form class="formNWifi">
				
				
				
				<h3>Cambiar red WiFi de cerradura</h3>


					


				<span>Ingrese nueva SSID: </span>
				<input placeholder="XXXXXXX" class="inputTxt" type="text" name="NSsid" required="" maxlength="30">
				<span>SSID actual: </span><span id="ssidActGes"></span>

				

				<span>Ingrese nueva coontraseña de Wifi: </span>
				<input placeholder="XXXXXXX" class="inputTxt" type="text" name="NWFPass" required="" maxlength="30">

				

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