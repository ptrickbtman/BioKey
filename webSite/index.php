
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/index.css">

    <script src="js/particles.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/validacion.js"></script>
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
    <?php
        include "view/menu.php";
        session_start();
        //session_destroy();
        //unset($_SESSION["cliente"]);
        session_destroy();
        menu();
        
    ?>
    <!--   menu  -->

    <div id="particles-js"></div>
    
    <div class="cover">
        <div class="contCover">
            <p class="tittleCover">BioKey</p>
            <p class="subTittle">La seguridad está al alcance de tus manos</p>
            <div class="botones">
                <div class="btn btn1"><p class="btnTxt">Login</p></div>
                <div class="btn btn2"><p class="btnTxt">Comprar</p></div>
            </div>

        </div>
    </div>
   


</body>
<script src="js/index.js"></script>
<script src="js/menu.js"></script>

</html>