<?php
    include "../controller/usuarioBD.php";
    include '../controller/hashToSalted.php';
    session_start();
    if(isset($_POST["passUser"]) && $_SESSION["usuario"] ){
        $pass = $_POST["passUser"];
        $user = $_SESSION["usuario"];
        $userObj = new usuariosDB($user[0],null,null,null,null,null,null,null,null);
        $userObj->set_pass(hashData($pass));
        if($userObj->setPassByIdUser()){
            echo 1;
        }else{
            echo 2;
        }
    }
    if(isset($_POST["numUser"]) && $_SESSION["usuario"] ){
        $num = $_POST["numUser"];
        $user = $_SESSION["usuario"];
        $userObj = new usuariosDB($user[0],null,null,null,null,null,null,null,null);
        $userObj->set_cell($num);
        if($userObj->setCellByIdUser()){
            echo 1;
        }else{
            echo 2;
        }
    }
?>