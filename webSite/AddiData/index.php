<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="css/index.css">
    
</head>
<body>

<?php

session_start();
include "../view/menu.php";
if(isset($_SESSION["usuario"]) && $_SESSION["usuario"][4]==2){
    menu2();
}else{
    header("Location:../index.php");
}

?>


    
</body>
<script src="../js/jquery.js"></script>
<script src="../js/menu.js"></script>
<script src="js/menuAdmin.js"></script>
</html>