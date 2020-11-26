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

</head>
<body>
	<?php 
		include "view/menu.php";
		menu();
	?>

<div class="contSimbolo">
	<div class="contLogo">
		
	<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 511.992 511.992" style="enable-background:new 0 0 511.992 511.992;" xml:space="preserve">
		<path d="M504.219,58.222c-9.13-7.53-22.527-6.186-30.015,2.901L190.483,405.62L36.42,251.579c-8.341-8.341-21.823-8.341-30.164,0
			c-8.341,8.341-8.341,21.823,0,30.164l170.66,170.66c3.989,4.032,9.429,6.25,15.082,6.25c0.341,0,0.683,0,1.024-0.021
			c6.037-0.277,11.626-3.093,15.445-7.744L507.12,88.236C514.608,79.127,513.328,65.709,504.219,58.222z"/>
</svg>

	</div>

	<div class="contApro">
		<p class="aproTxt">Aprobado!</p>
		<button class="volver">Volver</button>
	</div>
</div>


<div class="contInfoDetalle">

</div>


<script src="js/menu.js"></script>
<!--<script src="js/menu.js"></script>-->

</body>
</html>