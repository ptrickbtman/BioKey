<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioKey</title>
    <link rel="stylesheet" href="css/buyProduct.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="js/jquery.js">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="library/jquery.js"></script>
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
        include 'controller/menu.php';
        DesplegarMenu();
    ?>



    <div class="cover">
        <div class="leftCover">
            <div class="conInfo">
                <div class="circle"></div>
                <img src="medias/img/arduino.png" alt="img no encntrada">
            </div>
        </div>
        <div class="rightCover">
            <div class="conInfo">
                <div class="tittle">BioKey es...</div>
                <div class="subtittle">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt repellat blanditiis libero temporibus officia laudantium odio error at, et beatae quis accusamus nulla animi. Molestias praesentium modi deserunt iste pariatur.</div>
                <i class="fas fa-chevron-left cerrarLogin"></i>
            </div>
        </div>
    </div>




    <!--  Script  -->
    <script src="js/buy.js"></script>
    <script src="js/cargado.js"></script>
</body>

</html>