
<?php 

function menu(){?>
<div class="loading">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
          </svg>
    </div>

    <div class="menu">

        <div class="hamburger">
            <div class="stick stick1"></div>
            <div class="stick stick2"></div>
        </div>

        <div class="login">
            <i class="fas fa-sign-in-alt <?php 
            if (isset($_SESSION["usuario"]) && !empty($_SESSION["usuario"]) && $_SESSION["usuario"][0]!= "" ){echo "access2";}else{echo "access";} ?>"></i>
        </div>

    </div>


    <div class="loginCont">
        <div class="leftForm">
            <form class="formLogin">
                <p class="tittleForm tittleForm1">Bienvenido!</p>
                <p class="tittleForm tittleForm2">Gracias por ser nuestro cliente.</p>
                <label class="log1">Usuario o email:</label>
                <input class="inputLogin inputLogin1" type="text" name="user">
                <label class="log2" >Contraseña:</label>
                <input class="inputLogin inputLogin2" type="password" name="pass">
                <input type="button" class="btnLogin" value="Entrar">
               
                <div class="contRe">
                    <p class="recuperar">¿no tienes cuenta? registrate <span>aquí!</span></p>
                </div>

            </form>
        </div>

        <div class="rightForm">
            <svg class="editorial" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="gentle-wave"d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18v44h-352z" />
            </defs>
            <g class="parallax1">
                <use xlink:href="#gentle-wave" x="50" y="3" fill="#f461c1"/>
            </g>
            <g class="parallax2">
                <use xlink:href="#gentle-wave" x="50" y="0" fill="#4579e2"/>
            </g>
            <g class="parallax3">
                <use xlink:href="#gentle-wave" x="50" y="9" fill="#3461c1"/>
            </g>
            <g class="parallax4">
                <use xlink:href="#gentle-wave" x="50" y="6" fill="#fff"/>  
            </g>
        </div>
    </div>




    <!--   fin menu  -->
<?php
}
?>
