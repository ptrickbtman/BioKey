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
</head>
<body>

    <h1>Datos de mi cuenta.</h1>

    <label>Usuario: </label>
    <span><?php echo $datos[1]; ?></span>

    <br>

    <label>Correo elecctronico: </label>
    <span><?php echo $datos[5]; ?></span>

    <br>

    <label>Nombre: </label>
    <span><?php echo $datos[2]; ?></span>

    <br>

    <label>Apellido: </label>
    <span><?php echo $datos[3]; ?></span>

    <br>
    <form class="formNPass">    

        <h3>Cambiar contraseña (Debe contar con numeros y letras)</h3>

        <span class="lblGes1">Ingrese nueva coontraseña: <span class="lblGes1" id="spanGes1"></span></span>             
        <input class="inputTxt" class="inputTxt" type="password" name="NPass" id="NPass" required="" maxlength="30" placeholder="*********">

        <br>


        <span class="lblGes2">Repita nueva coontraseña: <span class="lblGes2" id="spanGes2"></span></span>
        <input class="inputTxt" type="password" name="RNPass" id="RNPass" id="RNPass" required="" maxlength="30" placeholder="*********">




        <input type="hidden" name="idU" id="idU" value="<?php echo $datos[0]; ?>">
        <input class="btnAct" type="button" name="btn" value="Actualizar contraseña" onclick="">



    </form>
</body>
</html>