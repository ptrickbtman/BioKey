<?php
include "../controller/validacionTxtNumEmail.php";
include "../controller/usuario.php";

if(isset($_POST['loginAccess']) && !empty($_POST['loginAccess']) ){
    $data = $_POST['loginAccess']; // user and pass
    
    $user = new usuariosDB(null,null,null,null,null,null,null,null,null,null);


    if(validarEmail($data["user"]) ){
        $user->set_email($data["user"]);
    }else{
        $user->set_alias($data["user"]);
    }
    $user->set_pass($data["passUser"]);
    
    $user =  $user->accessUsu($user);
    
    if($user->get_id_user() != "" ){
        session_start();
        session_regenerate_id();
        $_SESSION['usuario'] = $user;
    }

    print_r( $_SESSION['usuario']);
    

    

    /*
    if($ilUsuario->findUsu()){
        echo "paso";
    }else{
        echo "no paso";
    }
    */
    
    
}

?>