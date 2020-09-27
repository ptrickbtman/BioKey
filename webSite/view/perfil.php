

<?php 
$user = $_SESSION["usuario"];

function validarEstadoActivado(){ 
    $user = $_SESSION["usuario"];
    if( $user[4] == 3 ){
        return 3;
    }else if( $user[4] == 2 ){
        return 2;
    }
        
}

// creamos contenido segun el estado del usuario

function crearContenido($data){
    $user = $_SESSION["usuario"];
    // Cuenta iniciada recientemente estado 3
    if ($data == 0) {
        header("Location:index.php");
    }else if($data == 3){
        ?>

            <div class="containerVerify">
                <div class="left">
                    <div class="contLeft">
                        <form class="contVeryfu">
                            <p class="titulo">Bienvenido <?php echo $user[1]," ",$user[2] ?>!</p>
                            <p class="subTit">Por motivos de segurar, ingresa el codigo de tu producto para confirmar la cuenta.</p>
                            <input type="text" class="codeInput" name="dataVerify" placeholder="xxxx-xxxx-xxxx-xxxx">
                            <input type="button" class="btnVerify" value="Confirmar Cuenta" >
                        </form>   
                    </div>
                </div>
            </div>

        <?php
    }else if($data == 4){ // cuenta iniciada ya confirmada

    }
}


?>