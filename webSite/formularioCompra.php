<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario compra</title>
</head>
<body>
	<div class="contP">
		<form >
			<h1>Formulario de compra</h1>
			<h2>Datos del comprador</h2>
			<table>
				<tr>
					<td><label for="rutFC">Rut(*): </label></td>
					<td><input type="text" name="rutFC" placeholder="11111111-1" required=""></td>
				</tr>
				<tr>
					<td><label for="nomFC">Nombre(*): </label></td>
					<td><input type="text" name="nomFC" placeholder="Ejemplo" required=""></td>
				</tr>
				<tr>
					<td><label for="apeFC">Apellido(*): </label></td>
					<td><input type="text" name="apeFC" placeholder="Ejemplo" required=""></td>
				</tr>
				<tr>
					<td><label for="corFC">Correo(*): </label></td>
					<td><input type="text" name="corFC" placeholder="Ejemplo@algo.cl" required=""></td>
				</tr>
				<tr>
					<td><label for="telFC">N° Telefonico(*): </label></td>
					<td><input type="text" name="telFC" placeholder="9 12345678" required=""></td>
				</tr>
				<tr>
					<td colspan="2">
						<h2>Datos para entrega</h2>
					</td>
				</tr>
				<tr>
					<td><label for="regFC">Region(*): </label></td>
					<td>
						<select name="regFC" required="">
							<option value="">Seleccione...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="ciuFC">Ciudad(*): </label></td>
					<td>
						<select name="ciuFC" required="">
							<option value="">Seleccione...</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="comFC">Comuna(*): </label></td>
					<td><input type="text" name="comFC" placeholder="Ejemplo" required=""></td>
				</tr>
				<tr>
					<td><label for="call1FC">Calle 1(*): </label></td>
					<td><input type="text" name="call1FC" placeholder="Ejemplo" required=""></td>
				</tr>
				<tr>
					<td><label for="call2FC">Calle 2: </label></td>
					<td><input type="text" name="call2FC" placeholder="Opcional"></td>
				</tr>
				<tr>
					<td><label for="numFC">Numero(*): </label></td>
					<td><input type="text" name="numFC" placeholder="1111" required=""></td>
				</tr>
				<tr>
					<td><label for="villFC">Villa: </label></td>
					<td><input type="text" name="villFC" placeholder="Opcional"></td>
				</tr>
				<tr>
					<td><label for="blockFC">Block: </label></td>
					<td><input type="text" name="blockFC" placeholder="Opcional"></td>
				</tr>
				<tr>
					<td colspan="2">
						<h2>Detalle del pedido</h2>
					</td>
				</tr>
				<tr>
					<td><label for="cantPFC">Cantidad de cerraduras: </label></td>
					<td><input type="number" name="blockFC"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Continuar"></td>
				</tr>
				

			</table>
		</form>
	</div>
</body>
</html>