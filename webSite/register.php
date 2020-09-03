<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioKey</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="js/jquery.js">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="library/jquery.js"></script>
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <?php
        include 'controller/menu.php';
        include 'controller/register.php';
        DesplegarMenu();
        DesplegarFormulario();
    ?>


    <!--  Script  -->
    <script src="js/cargado.js"></script>
</body>

</html>