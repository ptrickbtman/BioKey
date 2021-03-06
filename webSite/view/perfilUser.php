<?php

function desplegarToken($name){
    ?>

        <div class="cover">
            <form class="validarCuenta">

                <p class="tittleVali">Hola <?php echo $name?></p>
                <p class="subTittleVali">Ingrese el serial de su producto para validar la cuenta. Gracias por su preferencia :)</p>
                <input type="text" class="inputValidar" name="serial" placeholder="xxxx-xxxx-xxxx-xxxx">
                <input type="button" value="validarSerial" class="btnValidar">
            </form>
        </div>

    <?php
}
?>


<!--  separamos la funcion -->

<?php
function desplegarCerraduras(){
include 'controller/cerraduraBD.php';

if (true) { //if para validar variable de sesion
	$cerradura = new cerraduraBD(null, 1, null, null, null, null, null, null);
	$cerraduras = $cerradura->selectCerradurasDeUsuario();
	?>
	
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
	<?php  
}
}
?>