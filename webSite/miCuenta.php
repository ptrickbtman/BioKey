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
	
</body>
</html>