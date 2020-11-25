<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario compra</title>
	
	
	<script src="js/jquery.js"></script>
	<script src="js/formularioCompra.js"></script>
	<script src="js/validacion.js"></script>
	<script src="js/particles.js"></script>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/formularioCompra.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>

</head>
<body>

	<?php
        include "view/menu.php";
        menu();
        
    ?>
	<!--   menu  -->
	<div id="particles-js"></div>

	<div class="contP">
		<div class="contF">
			<form class="formCompra">
				<h1>Formulario de compra</h1>
				<h2>Datos del comprador</h2>

				
				<label class="lblComp1" for="rutFC">Rut(*): </label>
				<input class="inputTxt" type="text" name="rutFC" placeholder="11111111-1" required="">
				
				
				<label class="lblComp2" for="nomFC">Nombre(*): </label>
				<input class="inputTxt" type="text" name="nomFC" placeholder="Ejemplo" required="">
				
				
				<label class="lblComp3" for="apeFC">Apellido(*): </label>
				<input class="inputTxt" type="text" name="apeFC" placeholder="Ejemplo" required="">
				
				
				<label class="lblComp4" for="corFC">Email(*): </label>
				<input class="inputTxt" type="text" name="corFC" placeholder="Ejemplo@algo.cl" required="">
				
				
				<label class="lblComp5" for="telFC">N° Telefonico(*): </label>
				<input class="inputTxt" type="text" name="telFC" placeholder="9 12345678" required="">
				

				<h2>Datos para entrega</h2>


				<label class="lblComp6" for="regFC">Region(*): </label>
				<select class="inputSelect" name="regFC" id="regFC" required="">
					<option value=""id="regFC">Seleccione...</option>
				</select>


				<label class="lblComp7" for="ciuFC">Ciudad(*): </label>
				<select class="inputSelect" name="ciuFC" id="ciuFC" required="">
					<option value="">Seleccione...</option>
				</select>



				<label class="lblComp8" for="comFC">Comuna(*): </label>
				<input  class="inputTxt" type="text" name="comFC" placeholder="Ejemplo" required="">


				<label class="lblComp9" for="call1FC">Calle 1(*): </label>
				<input class="inputTxt" type="text" name="call1FC" placeholder="Ejemplo" required="">


				<label class="lblComp10" for="call2FC">Calle 2: </label>
				<input class="inputTxt" type="text" name="call2FC" placeholder="Opcional">


				<label class="lblComp11" for="numFC">Numero(*): </label>
				<input class="inputTxt" type="text" name="numFC" placeholder="1111" required="">


				<label class="lblComp12" for="villFC">Villa: </label>
				<input class="inputTxt" type="text" name="villFC" placeholder="Opcional">


				<label class="lblComp13" for="blockFC">Block: </label>
				<input class="inputTxt" type="text" name="blockFC" placeholder="Opcional">

				<h2>Detalle del pedido</h2>

				<label class="lblComp14" for="cantPFC">Cantidad de cerraduras: </label>
				<input class="inputTxt" type="number" name="cantiFC" value="1" min="1" max="5" class="asd">

				<input type="button" value="Continuar" id="btnContinuar" onclick="continuarCompra()">
				
			</form>

		</div>
	</div>
</body>
	<script src="js/menu.js"></script>
</html>