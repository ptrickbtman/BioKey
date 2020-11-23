<?php  
session_start();
if (isset($_SESSION["cliente"])) {

	require 'mercadoPagoCompouser/vendor/autoload.php';
	MercadoPago\SDK::setAccessToken('APP_USR-5902561977241218-082017-0c6e02e7447cc582bff2833f48aa84d3-628870633');//token usuario venderdor mercadopago.
	$preference = new MercadoPago\Preference();
	

	$item = new MercadoPago\Item();
	$item->title = 'Cerradura BioKey 1.1';
	$item->quantity = $_SESSION["cliente"]['cantiFC'];
	$item->unit_price = '90000';
	$preference->items = array($item);

	$payer = new MercadoPago\Payer();
	$payer->name = $_SESSION["cliente"]['nomFC'];
	$payer->surname = $_SESSION["cliente"]['apeFC'];
	$payer->email = $_SESSION["cliente"]['corFC'];


	$preference->payer = $payer;

	$preference->back_urls = array(
		"success" => "http://localhost/mundofinal/mundoLejano/controladores/registrarPago.php",
		"failure" => "http://localhost/mundofinal/mundoLejano/reprobado.php",
		"pending" => "http://localhost/mundofinal/mundoLejano/reprobado.php"
	);

	$preference->payment_methods = array(
		"excluded_payment_types" => array(
			array("id" => "ticket"),
			array("id" => "khipu")
		),
	);

	$preference->save();

	?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Confirmar pedido</title>
		<script src="js/jquery.js"></script>
		<script src="js/confirmarCompra.js"></script>
	</head>
	<body>
		<?php 
		print_r($_SESSION["cliente"]);
		?>
		<div class="contP">
			<div class="contF">
				<h1>Confirmación de datos para el pedido</h1>
				<h2>Datos del comprador:</h2>
				<span class="spnTDatos">Rut: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["rutFC"]; ?></span><br>
				<span class="spnTDatos">Nombre: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["nomFC"]; ?></span><br>
				<span class="spnTDatos">Apellido: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["apeFC"]; ?></span><br>
				<span class="spnTDatos">Email: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["corFC"]; ?></span><br>
				<span class="spnTDatos">Telefono: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["telFC"]; ?></span><br>
				<h2>Datos para el envio:</h2>
				<input type="hidden" id="inptIdReg" value="<?php echo $_SESSION["cliente"]["regFC"]; ?>">
				<input type="hidden" id="inptIdCiu" value="<?php echo $_SESSION["cliente"]["ciuFC"]; ?>">
				<span class="spnTDatos">Region: </span><span class="spnDatos" id="spnDReg"></span><br>
				<span class="spnTDatos">Ciudad: </span><span class="spnDatos" id="spnDCiu"></span><br>
				<span class="spnTDatos">Comuna: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["comFC"]; ?></span><br>
				<span class="spnTDatos">Direccion: </span>
				<span class="spnDatos">
					<?php 
					echo $_SESSION["cliente"]["call1FC"]." #".$_SESSION["cliente"]["numFC"];
					if (!empty($_SESSION["cliente"]["villFC"])) {
						echo ", villa ".$_SESSION["cliente"]["villFC"];
					} 
					if (!empty($_SESSION["cliente"]["blockFC"])) {
						echo ", block ".$_SESSION["cliente"]["blockFC"];
					} 

					?>
				</span><br>
				<span class="spnTDatos">Metodo de pago: </span><br>
				<div id="opcMetP">
					
				</div>
				
				<input type="button" class="botonFalso" onclick="location.href='<?php echo $preference->init_point; ?>'" value="Continuar">
			</div>
		</div>
		<br>
		
	</body>
	</html>
	<?php  
}
?>