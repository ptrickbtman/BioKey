<?php 
include 'controller/cerraduraBD.php';


if (isset($_POST['idC'])) { //if para validar variable de sesion
	$cerraduras = new cerraduraBD($_POST['idC'],null, null, null, null, null, null, null);
	$cerradura = $cerraduras->selectCerradura();
	?>
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
			<h1>Gestionar cerradura <?php echo $cerradura->get_serial_cerradura(); ?></h1>
			<form action="actualizarCerr.php" method="post">
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
							<input type="text" name="NPass" required="" maxlength="6">
						</td>
					</tr>
					<tr>
						<td>
							<span>Repita nueva coontraseña: </span>
						</td>
						<td>
							<input type="text" name="RNPass" required="" maxlength="6">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="hidden" name="idC" value="<?php echo $cerradura->get_cod_cerradurar(); ?>">
							<input type="submit" name="btn" value="Actualizar contraseña">
						</td>
					</tr>
				</table>
			</form>
			<form action="actualizarCerr.php" method="post">
				<table>
					<tr>
						<td colspan="3">
							<h3>Cambiar red WiFi de cerradura</h3>
						</td>
					</tr>
					<tr>
						<td>
							<span>Ingrese nueva SSID: </span>
						</td>
						<td>
							<input type="text" name="NSsid" required="" maxlength="30">
						</td>
						<td>
							<span>SSID actual: <?php echo $cerradura->get_ssid_cerradura(); ?></span>
						</td>
					</tr>
					<tr>
						<td>
							<span>Ingrese nueva coontraseña de Wifi: </span>
						</td>
						<td>
							<input type="text" name="NWFPass" required="" maxlength="30">
						</td>	
					</tr>
					<tr>
						<td colspan="3">
							<input type="hidden" name="idC" value="<?php echo $cerradura->get_cod_cerradurar(); ?>">
							<input type="submit" name="btn" value="Actualizar red">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
	</html>
	<?php  
}
?>