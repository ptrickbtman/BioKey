<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Compra aprobada</title>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/compraAprobada.css">

	<script src="js/particles.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/validacion.js"></script>
	<script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<script src="js/menu.js"></script>
</head>
<body>
	<?php 
	include "view/menu.php";
	session_start();
	menu();
	if (isset($_SESSION["cliente"]['ordFC'])==false){
		echo '<script language="javascript">window.location.href = "formularioCompra.php";</script>';
	}
	
	?>
	<div class="contSimbolo">
		<div class="contLogo">

			<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			viewBox="0 0 511.992 511.992" style="enable-background:new 0 0 511.992 511.992;" xml:space="preserve">
			<path d="M504.219,58.222c-9.13-7.53-22.527-6.186-30.015,2.901L190.483,405.62L36.42,251.579c-8.341-8.341-21.823-8.341-30.164,0
			c-8.341,8.341-8.341,21.823,0,30.164l170.66,170.66c3.989,4.032,9.429,6.25,15.082,6.25c0.341,0,0.683,0,1.024-0.021
			c6.037-0.277,11.626-3.093,15.445-7.744L507.12,88.236C514.608,79.127,513.328,65.709,504.219,58.222z"/></svg>			
		</div>

		<div class="contApro">
			<p class="aproTxt">Aprobado!</p>
			<button class="volver" onclick=" window.location.href = 'index.php';">Volver</button>
		</div>

	</div>
	<div class="contInfoDetalle">
		<div class="left">
			<div class="contText"><h1>Datos de comprador</h1></div>
		</div>
		<div class="right">
			<div class="contText"><p>Rut: <?php echo $_SESSION["cliente"]["rutFC"]; ?></p></div>
		</div>
		<div class="right">
			<div class="contText"><p>Nombre: <?php echo $_SESSION["cliente"]["nomFC"]." ".$_SESSION["cliente"]["apeFC"]; ?></p></div>
		</div>
		<div class="right">
			<div class="contText"><p>Correo: <?php echo $_SESSION["cliente"]["corFC"]; ?></p></div>
		</div>
		<div class="right">
			<div class="contText"><p>Telefono: <?php echo $_SESSION["cliente"]["telFC"]; ?></p></div>
		</div>
		<div class="right">
			<div class="contText"><p>Comuna: <?php echo $_SESSION["cliente"]["comFC"]." (Region ".$_SESSION["cliente"]["nomRegFC"].")"; ?>
		</div>
		<div class="right">
			<div class="contText"><p>Direccion: <?php 
			echo $_SESSION["cliente"]["call1FC"]." #".$_SESSION["cliente"]["numFC"];
			if (!empty($_SESSION["cliente"]["villFC"])) {
				echo ", villa ".$_SESSION["cliente"]["villFC"];
			} 
			if (!empty($_SESSION["cliente"]["blockFC"])) {
				echo ", block ".$_SESSION["cliente"]["blockFC"];
			} 
			?></p></div>
		</div>
		<div class="left">
			<div class="contText"><h1>Detalle de la compra</h1></div>
		</div>
		<div class="right">
			<div class="contText"><p>N° de orden: <?php echo $_SESSION["cliente"]["ordFC"]; ?></p></div>
		</div>
		<div class="right">
			<div class="contText"><p> - <?php echo $_SESSION["cliente"]["cantiFC"]; ?> Cerradura inteligente BioKey V1.1 ($<?php echo $_SESSION["cliente"]["preUnitFC"]; ?>)</p></div>
		</div>
		<div class="right">
			<div class="contText"><p>Precio total: $<?php echo $_SESSION["cliente"]["preTotFC"]; ?> </p></div>
		</div>
		<br>
		<div class="right">
			<div class="contText"><p>Metodo de pago: <?php echo $_SESSION["cliente"]["nomMetPagFC"]; ?> </p></div>
		</div>
		<div class="right">
			<div class="contText"><p>Fecha compra: <?php echo $_SESSION["cliente"]["fechFC"]; ?> </p></div>
		</div>
		<form action="detalleBoleta.php" name="vol" method="post" target="_blank">
			<input type="hidden" name="rutC" value="<?php echo $_SESSION["cliente"]["rutFC"]; ?>">
			<input type="hidden" name="nomC" value="<?php echo $_SESSION["cliente"]["nomFC"]." ".$_SESSION["cliente"]["apeFC"]; ?>">
			<input type="hidden" name="corC" value="<?php echo $_SESSION["cliente"]["corFC"]; ?>">
			<input type="hidden" name="telC" value="<?php echo $_SESSION["cliente"]["telFC"]; ?>">
			<input type="hidden" name="comC" value="<?php echo $_SESSION["cliente"]["comFC"]." (Region ".$_SESSION["cliente"]["nomRegFC"].")"; ?>">
			<input type="hidden" name="dirC" value="<?php 
			echo $_SESSION["cliente"]["call1FC"]." #".$_SESSION["cliente"]["numFC"];
			if (!empty($_SESSION["cliente"]["villFC"])) {
				echo ", villa ".$_SESSION["cliente"]["villFC"];
			} 
			if (!empty($_SESSION["cliente"]["blockFC"])) {
				echo ", block ".$_SESSION["cliente"]["blockFC"];
			} 
			?>">
			<input type="hidden" name="ordC" value="<?php echo $_SESSION["cliente"]["ordFC"]; ?>">
			<input type="hidden" name="cantiC" value="<?php echo $_SESSION["cliente"]["cantiFC"]; ?>">
			<input type="hidden" name="preUnitC" value="<?php echo $_SESSION["cliente"]["preUnitFC"]; ?>">
			<input type="hidden" name="preTotC" value="<?php echo $_SESSION["cliente"]["preTotFC"]; ?>">
			<input type="hidden" name="nomMetPagC" value="<?php echo $_SESSION["cliente"]["nomMetPagFC"]; ?>">
			<input type="hidden" name="fechC" value="<?php echo $_SESSION["cliente"]["fechFC"]; ?>">
			<input type="submit" class="btnDescargar" value="Descargar boleta">
		</form>
	</div>
</body>
</html>