<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario compra</title>
	<script src="js/jquery.js"></script>
	<script src="js/formularioCompra.js"></script>
</head>
<body>
	<div class="contP">
		<div class="contF">
			<form class="formCompra">
				<h1>Formulario de compra</h1>
				<h2>Datos del comprador</h2>

				
				<label for="rutFC">Rut(*): </label>
				<input type="text" name="rutFC" placeholder="11111111-1" required=""><br>
				
				
				<label for="nomFC">Nombre(*): </label>
				<input type="text" name="nomFC" placeholder="Ejemplo" required=""><br>
				
				
				<label for="apeFC">Apellido(*): </label>
				<input type="text" name="apeFC" placeholder="Ejemplo" required=""><br>
				
				
				<label for="corFC">Email(*): </label>
				<input type="text" name="corFC" placeholder="Ejemplo@algo.cl" required=""><br>
				
				
				<label for="telFC">N° Telefonico(*): </label>
				<input type="text" name="telFC" placeholder="9 12345678" required=""><br>
				

				<h2>Datos para entrega</h2>


				<label for="regFC">Region(*): </label>
				<select name="regFC" id="regFC" required="">
					<option value=""id="regFC">Seleccione...</option>
				</select><br>



				<label for="ciuFC">Ciudad(*): </label>
				<select name="ciuFC" id="ciuFC" required="">
					<option value="">Seleccione...</option>
				</select><br>



				<label for="comFC">Comuna(*): </label>
				<input type="text" name="comFC" placeholder="Ejemplo" required=""><br>


				<label for="call1FC">Calle 1(*): </label>
				<input type="text" name="call1FC" placeholder="Ejemplo" required=""><br>


				<label for="call2FC">Calle 2: </label>
				<input type="text" name="call2FC" placeholder="Opcional"><br>


				<label for="numFC">Numero(*): </label>
				<input type="text" name="numFC" placeholder="1111" required=""><br>


				<label for="villFC">Villa: </label>
				<input type="text" name="villFC" placeholder="Opcional"><br>


				<label for="blockFC">Block: </label>
				<input type="text" name="blockFC" placeholder="Opcional"><br>

				<h2>Detalle del pedido</h2>

				<label for="cantPFC">Cantidad de cerraduras: </label>
				<input type="number" name="cantiFC" value="1" min="1" max="5" class="asd"><br>

				<input type="button" value="Continuar" id="btnContinuar"><br>
				



			</form>

		</div>
	</div>
</body>
</html>