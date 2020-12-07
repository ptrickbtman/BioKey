<?php
//datos = 0 => id , 1 => nom_user, 2 => nombre , 3 => apellido, 4 => estado 
    session_start(); 
    //print_r($_SESSION["usuario"]);
    if(isset($_SESSION["usuario"])){
        $datos  = $_SESSION["usuario"];
        if($datos[4]==2){
            header("Location:http://192.168.64.2/BioKey/webSite/AddiData/index.php");
        }
    }else{
        header("Location:http://192.168.64.2/BioKey/webSite/");
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/perfil.css">

    <script src="js/particles.js"></script>
    <script src="js/validacion.js"></script>
    <script src="js/jquery.js"></script>
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
<!--   menu  -->

<div id="particles-js"></div>
    <?php
        include "view/menu.php";
        include "view/perfilUser.php";
        menu();
       
    ?>

    <div class="cover">
        <div class="contCover">
            
        </div>
    </div>


   


</body>
<script src="js/menu.js"></script>
<script src="js/perfilUser.js"></script>

</html>