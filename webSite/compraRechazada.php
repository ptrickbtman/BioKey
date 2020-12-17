<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>BioKey | Compra rechazada</title>

	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/compraRechazada.css">

	<script src="js/particles.js"></script>
	<script src="js/jquery.js"></script>
	<script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	
</head>
<body>

	<?php   include "view/menu.php"; session_start();  menu(); ?>

	<div class="containerRechazado">
		<div class="left">
			<div class="contInfo contInfoLeft">
				<div class="imgInfo">
				
				</div>
			</div>
		</div>
		<div class="right">
			<div class="contInfo contInfoRight">
				<h1>Lo lamentamos!</h1>
				<p class="subTittle">Su compra ha sido rechazada</p>
				<p class="infoUtil">En caso de haber efectuado correctamente la transaccións y ve este mensaje, por favor contactar directamente al "+569 9999999" o al "test@abiokey.cl"</p>
				<button>Volver</button>
			</div>
		</div>
	</div>
</body>

<script src="js/menu.js"></script>


</html>



