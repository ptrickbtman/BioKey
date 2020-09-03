<!--  crear funcion para llamar al codigo -->

<div class="loader">
        <div class="circle"></div>
    </div>

    <div class="menu">
        <div class="logo">
            <p>BK</p>
        </div>



        <div class="hamburger">
            <div class="stick stick1"></div>
            <div class="stick stick2"></div>
            <div class="stick stick3"></div>
        </div>

        <?php 
            if($data ==1){ 
        ?> 
        <div class="contLogin">
            <div class="contLogin">
                <i class="fas fa-sign-in-alt abrirModal"></i>
            </div>
        </div>
        <?php
            }
        ?>    

    </div>

    <div class="modalLogin">
        <div class="contLoginBinary">
            <div class="contLoginBinary2">
                <p class="textBinary">01010100 01110010 01100001 01100010 01100001 01101010 01100001 01101101 01101111 01110011 00100000 01110000 01100001 01110010 01100001 00100000 01110100 01101001</p>
            </div>
        </div>
        <div class="contModalLogin">
            <form class="formLogin">
                <p class="tittleForm">Bienvenido</p>
                <label> Usuario o email</label>
                <input type="text" name="user">
                <label> Pass</label>
                <input type="password" name="passUser">
                <input type="button" class="btnEnvio" value="ingresar">
                <p class="ir">¿No tienes cuenta? </p>
                <span class="btnRegistr"> Click Aqui </span>
                <i class="fas fa-chevron-left cerrarLogin"> Atras </i>
            </form>
        </div>
    </div>




    <!-- fin crear funcion para llamar al codigo -->