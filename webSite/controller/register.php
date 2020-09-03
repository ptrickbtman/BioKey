<?php 



function DesplegarFormulario(){
    if (isset($_SESSION["clienteBiokey"]) ){
        header("Location:index.php");
    }else{
        include "view/register.php";
    }    
}
?>