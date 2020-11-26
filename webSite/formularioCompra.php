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

				
				<label class="lblComp1" for="rutFC">Rut(*): <span class="lblComp1" id="spnValComp1"></span></label>
				<input class="inputTxt" type="text" name="rutFC" id="rutFC" placeholder="11111111-1" required="" maxlength="12">
				
				
				<label class="lblComp2" for="nomFC">Nombre(*): <span class="lblComp2" id="spnValComp2"></span></label>
				<input class="inputTxt" type="text" name="nomFC" id="nomFC" placeholder="Ejemplo" required="" maxlength="25">
				
				
				<label class="lblComp3" for="apeFC">Apellido(*): <span class="lblComp3" id="spnValComp3"></span></label>
				<input class="inputTxt" type="text" name="apeFC" id="apeFC" placeholder="Ejemplo" required="" maxlength="25">
				
				
				<label class="lblComp4" for="corFC">Email(*): </label>
				<input class="inputTxt" type="text" name="corFC" placeholder="Ejemplo@algo.cl" required="" maxlength="40">
				
				
				<label class="lblComp5" for="telFC">N° Telefonico(*): </label>
				<input class="inputTxt" type="text" name="telFC" placeholder="9 12345678" required="" maxlength="12">
				

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
				<input  class="inputTxt" type="text" name="comFC" placeholder="Ejemplo" required="" maxlength="40">


				<label class="lblComp9" for="call1FC">Calle 1(*): </label>
				<input class="inputTxt" type="text" name="call1FC" placeholder="Ejemplo" required="" maxlength="40">


				<label class="lblComp10" for="call2FC">Calle 2: </label>
				<input class="inputTxt" type="text" name="call2FC" placeholder="Opcional" maxlength="40">


				<label class="lblComp11" for="numFC">Numero(*): </label>
				<input class="inputTxt" type="text" name="numFC" placeholder="1111" required="" maxlength="8">


				<label class="lblComp12" for="villFC">Villa: </label>
				<input class="inputTxt" type="text" name="villFC" placeholder="Opcional" maxlength="40">


				<label class="lblComp13" for="blockFC">Block: </label>
				<input class="inputTxt" type="text" name="blockFC" placeholder="Opcional" maxlength="3">

				<h2>Detalle del pedido</h2>

				<label class="lblComp14" for="cantPFC">Cantidad de cerraduras: </label>
				<input class="inputTxt" type="number" name="cantiFC" value="1" min="1" max="10" class="asd">

				<input type="button" value="Continuar" id="btnContinuar" onclick="continuarCompra()">
				
			</form>

		</div>
	</div>
</body>
	<script src="js/menu.js"></script>
</html>