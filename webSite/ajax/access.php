<?php
include "../controller/validacionTxtNumEmail.php";
include "../controller/usuarioBD.php";
include "../controller/hashToSalted.php";
if(isset($_POST['loginAccess']) && !empty($_POST['loginAccess']) ){
    $data = $_POST['loginAccess']; // user and pass
    $user = new usuariosDB(null,null,null,null,null,null,null,null,null);
    
    if(validarEmail($data["user"]) ){
        //echo "paso email";
        $user->set_email($data["user"]);
    }else{
        //echo "paso alias";
        $user->set_alias($data["user"]);
    }
    $user->set_pass($data["pass"]);
    
    ////print_r($user);
    if($user->accessUsu($user)){
        session_start();
        session_regenerate_id();
        $usuario =[$user->get_id_user(), $user->get_alias(),$user->get_name(),$user->get_surname(),$user->get_estado(), $user->get_email()];
        $_SESSION["usuario"] = $usuario;
        //print_r($user);
        //print_r($user->get_estado());
        if($user->get_estado()==2){
            echo 2;
        }else{
            echo 1;
        }  
    }else{
        echo -1;
    }
    //print_r($user);
}

?>