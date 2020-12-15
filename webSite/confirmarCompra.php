<?php  
session_start();
if (isset($_SESSION["cliente"])) {

	require 'mercadoPagoCompouser/vendor/autoload.php';
	MercadoPago\SDK::setAccessToken('APP_USR-5902561977241218-082017-0c6e02e7447cc582bff2833f48aa84d3-628870633');//token usuario venderdor mercadopago.
	$preference = new MercadoPago\Preference();
	

	$item = new MercadoPago\Item();
	$item->title = 'Cerradura BioKey 1.1';
	//$item->quantity = $_SESSION["cliente"]['cantiFC'];
	//$item->unit_price = '90000';
	$item->quantity = 1;
	$item->unit_price = 100;
	$preference->items = array($item);

	$payer = new MercadoPago\Payer();
	$payer->name = $_SESSION["cliente"]['nomFC'];
	$payer->surname = $_SESSION["cliente"]['apeFC'];
	$payer->email = $_SESSION["cliente"]['corFC'];


	$preference->payer = $payer;

	$preference->back_urls = array(
		"success" => "localhost/BioKey/BioKey/webSite/registrarVenta.php",
		"failure" => "localhost/BioKey/BioKey/webSite/compraRechazada.php",
		"pending" => "localhost/BioKey/BioKey/webSite/compraRechazada.php"
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

		<link rel="stylesheet" href="css/menu.css">
		<link rel="stylesheet" href="css/confirmarCompra.css">
		<script src="js/particles.js"></script>
		<script src="js/jquery.js"></script>
		<script src="js/confirmarCompra.js"></script>
		<script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	</head>
	<body>
		<?php 
		//print_r($_SESSION["cliente"]);
		include "view/menu.php";
		menu();
		?>

		<div id="particles-js"></div>
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
				<span class="spnTDatos">Region: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["nomRegFC"]; ?></span><br>
				<span class="spnTDatos">Ciudad: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["nomCiuFC"]; ?></span><br>
				<span class="spnTDatos">Comuna: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["comFC"]; ?></span><br>
				<span class="spnTDatos">Direccion:</span>
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
				</span>
				<input type="hidden" id="inptIdReg" value="<?php echo $_SESSION["cliente"]["regFC"]; ?>"><br>
				<input type="hidden" id="inptIdCiu" value="<?php echo $_SESSION["cliente"]["ciuFC"]; ?>">
				
				<h2>Metodo de pago(*): <span id="err1"></span></h2><div id="opcMetP"></div>
				<h2>Detalles de la compra:</h2>
				<span class="spnTDatos">Cantidad de cerraduras: </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["cantiFC"]; ?></span><br>
				<span class="spnTDatos">Precio unitario ($CLP): </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["preUnitFC"]; ?></span><br>
				<span class="spnTDatos">Precio total ($CLP): </span><span class="spnDatos"><?php echo $_SESSION["cliente"]["preTotFC"]; ?></span><br>
				<h2>Antes de continuar(*): <span id="err2"></span></h2>
				<img class="imgPago" src="medias/metP1.png"><img class="imgPago" src="medias/wp.png">
				<span class="spnDatos">Con mercado pago puedes pagar con tarjetas de Crédito o Débito (Redcompra / webpay).</span><br><br>
				<span class="spnDatos">Porfavor revise nuestras politicas de seguridad y reembolso:</span><br>
				<p class="polit" onclick="window.open('politicasPC.php', '_blank'); ">Politica de privacidad y cookies</p>
				<p class="polit" onclick="window.open('politicasR.php', '_blank'); ">Política de reembolso</p>
				<input type="checkbox" class="check"><span >Acepto haber leído las políticas del sitio web.</span>
				

				<?php //print_r($_SESSION['cliente']) ?>
				<input type="button" class="botonFalso" onclick="continuar();" value="Continuar con MercadoPago">
				
			</div>
		</div>
		<input type="hidden" class="urlFinal" value="<?php echo $preference->init_point; ?>">
	</body>
	<script src="js/menu.js"></script>
	</html>
	<?php  
}
?>