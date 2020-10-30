<?php
include "../controller/validacionTxtNumEmail.php";
include "../controller/usuario.php";

if(isset($_POST['loginAccess']) && !empty($_POST['loginAccess']) ){
    $data = $_POST['loginAccess']; // user and pass
    $user = new usuariosDB(null,null,null,null,null,null,null,null,null);
    
    if(validarEmail($data["user"]) ){
        $user->set_email($data["user"]);
    }else{
        $user->set_alias($data["user"]);
    }

    $user->set_pass($data["passUser"]);
    $user =  $user->accessUsu($user);

    //print_r($user);
    
    
    if($user->get_id_user() != "" ){ 
        session_start();
        session_regenerate_id();
        $usuario =[$user->get_id_user(), $user->get_alias(),$user->get_name(),$user->get_surname(),$user->get_estado()];
        $_SESSION["usuario"] = $usuario;
        echo 1;
    }
    
    
    
}

?>