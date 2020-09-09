<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioKey</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/menu.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="js/jquery.js"></script>
    

    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <?php
        include 'controller/menu.php';
        DesplegarMenu();
        include "view/register.php";
    ?>


    <!--  Script  -->
    <script src="js/registrar.js"></script>
    <script src="js/cargado.js"></script>
</body>

</html>