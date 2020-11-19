<?php

include 'controller/cerraduraBD.php';

if (true) { //if para validar variable de sesion
	$cerradura = new cerraduraBD(null, 1, null, null, null, null, null, null);
	$cerraduras = $cerradura->selectCerradurasDeUsuario();
	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
		<title>Tus cerraduras</title>
	</head>
	<style>

	</style>
	<body>
		<div class="contP">
			<h1>Tus cerraduras</h1>
			<table>
				<tr>
					<th><span>N° serial:</span></th>
					<th><span>Red actual:</span></th>
					<th><span>Ultima actualización:</span></th>
					<th><span>Estado actual:</span></th>
					<th><span>Opciones:</span></th>
				</tr>
				<?php 
				if ($cerraduras!="error") {
					for ($i=0; $i <count($cerraduras) ; $i++) { 
						?>
						<tr>
							<td><?php echo $cerraduras[$i]->get_serial_cerradura(); ?></td>
							<td><?php echo $cerraduras[$i]->get_ssid_cerradura(); ?></td>
							<td><?php echo $cerraduras[$i]->get_fecha_cerradura(); ?></td>
							<td><?php echo $cerraduras[$i]->get_estado_cerradura(); ?></td>
							<td>
								<form action="gestionarCerradura.php" method="post">
									<input type="hidden" name="idC" value="<?php echo $cerraduras[$i]->get_cod_cerradurar(); ?>">
									<input type="submit" value="Gestionar cerradura">
								</form>
							</td>
						</tr>
						<?php 
					}
				} 
				?>
			</table>
		</div>
	</body>
	</html>
	<?php  
}
?>