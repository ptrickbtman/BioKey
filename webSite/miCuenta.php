<?php
//datos = 0 => id , 1 => nom_user, 2 => nombre , 3 => apellido, 4 => estado 
session_start(); 
    //print_r($_SESSION["usuario"]);
if(isset($_SESSION["usuario"])){
    $datos  = $_SESSION["usuario"];
}else{
    header("Location:http://192.168.64.2/BioKey/webSite/");
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mi cuenta</title>
    <link rel="stylesheet" href="css/miCuenta.css">
    <link rel="stylesheet" href="css/menu.css">

    <script src="js/particles.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/validacion.js"></script>
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>

<?php include "view/menu.php"; menu();?>
<div id="particles-js"></div>
<div class="containerMiCuenta">
    <div class="contInfoMiCuenta">
        <div class="dataMiCuenta">
            <h1>Datos de mi cuenta.</h1>
            <label>Usuario:  <span><?php echo $datos[1]; ?></span> </label>
           
            <label>Correo elecctronico:  <span><?php echo $datos[5]; ?></span> </label>
           
            <label>Nombre: <span><?php echo $datos[2]." ". $datos[3] ; ?></span> </label>
                    
            <form class="formNPass">    
                <h3>Cambiar contraseña (Debe contar con numeros y letras)</h3>
                <span class="lblGes1">Ingrese nueva coontraseña: <span class="lblGes1" id="spanGes1"></span></span>             
                <input class="inputTxt" class="inputTxt" type="password" name="pass1" id="NPass" required="" maxlength="30" placeholder="*********">
                <span class="lblGes2">Repita nueva coontraseña: <span class="lblGes2" id="spanGes2"></span></span>
                <input class="inputTxt" type="password" name="pass2" id="RNPass" id="RNPass" required="" maxlength="30" placeholder="*********">
                <input class="btnAct btnSetPass" type="button" name="btn" value="Actualizar contraseña" onclick="">
            </form>
            <form class="formNum">    
                <h3>Cambio de numero telefonico (solo digitos)</h3>
                <span class="lblGes3">Numero:</span>
                <input class="inputTxt" class="inputTxt" type="number" name="num_tel" id="num_tel" required="" maxlength="9" placeholder="999999999">
                <input class="btnAct btnSetNum" type="button" name="btn" value="Actualizar numero" onclick="">
            </form>
        </div>
    </div>
</div>

</body>

<script src="js/miCuenta.js"></script>
<script src="js/menu.js"></script>
</html>