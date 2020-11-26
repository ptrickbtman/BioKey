<?php
    session_start();
    if(isset($_GET["idC"]) && isset($_SESSION["usuario"]) ){
        $idC = $_GET["idC"];
        $user=$_SESSION["usuario"];
    }else{
        header("Location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario compra</title>
	
	<script src="js/validacion.js"></script>
    
	<script src="js/particles.js"></script>
	<script src="js/jquery.js"></script>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/verRegistroCerradura.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>

</head>
<body>
    
    <div id="particles-js"></div>
    
    <?php
        include "view/menu.php";
        menu();
        echo '<input type="hidden" class="idC" name="idC" id="idCe" value="'.$idC.'" >';
        
        
    ?>
	<!--   menu  -->


	
</body>
    <script src="js/verRegistroCerradura.js"></script>
	<script src="js/menu.js"></script>
</html>