
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
            <i class="fas fa-sign-in-alt access"></i>
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
                <p class="recuperar">¿no tienes cuenta? registrate <span>aquí!</span></p>

            </form>
        </div>

        <div class="rightForm">

        </div>
    </div>




    <!--   fin menu  -->
<?php
}
?>
