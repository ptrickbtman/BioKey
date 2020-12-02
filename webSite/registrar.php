<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    
    <script src="js/particles.js"></script>
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
      <div id="particles-js"></div>
    
        <div class="cover">
            <div class="leftCover"></div>

            <div class="rightCover">
                <form class="formRegisterUser">
                    <p class="tittleFormReg">Crea tu <br> cuenta</p>

                    <label class="reg1">Nombre Usuario: <span class="reg1" id="spnReg1"></span></label>
                    <input class="inputData" type="text" name="usuario" id="usuario">

                    <label class="reg2">Email: <span class="reg2" id="spnReg2"></span></label>
                    <input class="inputData" type="email" name="email" id="email">

                    <label class="reg3">Nombre: <span class="reg3" id="spnReg3"></span></label>
                    <input class="inputData" type="text" name="nombre" id="nombre">

                    <label class="reg4">Apellido: <span class="reg4" id="spnReg4"></span></label>
                    <input class="inputData" type="text" name="apellido" id="apellido">

                    <label class="reg5">Numero telefonico (+569 ...): <span class="reg5" id="spnReg5"></span></label>
                    <input class="inputData" type="text" name="num" id="num">

                    <label class="reg6">Contraseña (Debe contar con numeros y letras): <span class="reg6" id="spnReg6"></span></label>
                    <input class="inputData" type="password" name="pass1" id="pass1">

                    <label class="reg7">Repetir contraseña: <span class="reg7" id="spnReg7"></span></label>
                    <input class="inputData" type="password" name="pass2" id="pass2">

                    <input class="registrar" value="registrar" type="button">
                </form>
            </div>
        </div>


</body>
<script src="js/menu.js"></script>
<script src="js/registrar.js"></script>

</html>