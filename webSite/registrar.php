<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- script necesarios menu -->
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/menu.css">
    <script src="js/validacion.js"></script>
    <script src="https://kit.fontawesome.com/fd543783d4.js" crossorigin="anonymous"></script>
     <!-- script necesarios menu -->

</head>

<body>
    <?php
    include "view/menu.php";
        menu();
    ?>
    
        <div class="cover">
            <div class="leftCover"></div>

            <div class="rightCover">
                <form class="formRegisterUser">
                    <p class="tittleFormReg">Crea tu <br> cuenta</p>

                    <label class="reg1">Nombre Usuario:</label>
                    <input type="text" name="usuario">

                    <label class="reg2">Email:</label>
                    <input type="email" name="email" id="email">

                    <label class="reg3">Nombre:</label>
                    <input type="text" name="nombre">

                    <label class="reg4">Apellido:</label>
                    <input type="text" name="apellido">

                    <label class="reg7">Numero telefonico (+569 ...):</label>
                    <input type="text" name="num">

                    <label class="reg5">Contraseña (Debe contar con numeros y letras):</label>
                    <input type="password" name="pass1">

                    <label class="reg6">Repetir contraseña:</label>
                    <input type="password" name="pass2">

                    <input class="registrar" value="registrar" type="button">
                </form>
            </div>
        </div>




</body>
<script src="js/menu.js"></script>
<script src="js/registrar.js"></script>

</html>