<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
	<title>Gestionar cerradura</title>
</head>
<style>
	
</style>
<body>
	<div class="contP">
		<h1>Gestionar cerradura</h1>
		<form action="">
			<table>
				<tr>
					<td colspan="2">
						<h3>Cambiar contraseña cerradura (numerica)</h3>
					</td>
				</tr>
				<tr>
					<td>
						<span>Ingrese nueva coontraseña: </span>
					</td>
					<td>
						<input type="text" name="NPass" required="">
					</td>
				</tr>
				<tr>
					<td>
						<span>Repita nueva coontraseña: </span>
					</td>
					<td>
						<input type="text" name="RNPass" required="">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Actualizar contraseña">
					</td>
				</tr>
			</table>
		</form>
		<form action="">
			<table>
				<tr>
					<td colspan="2">
						<h3>Cambiar red WiFi de cerradura</h3>
					</td>
				</tr>
				<tr>
					<td>
						<span>Ingrese nueva SSID: </span>
					</td>
					<td>
						<input type="text" name="NSsid" required="">
					</td>
				</tr>
				<tr>
					<td>
						<span>Ingrese nueva coontraseña de Wifi: </span>
					</td>
					<td>
						<input type="text" name="NWFPass" required="">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" value="Actualizar red">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>