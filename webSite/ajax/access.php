<?php
include "../controller/validacionTxtNumEmail.php";
include "../controller/usuario.php";

if(isset($_POST['loginAccess']) && !empty($_POST['loginAccess']) ){
    $data = $_POST['loginAccess']; // user and pass
    
    $user = new usuariosDB(null,null,null,null,null,null,null,null);


    if(validarEmail($data["user"]) ){
        $user->set_email($data["user"]);
    }else{
        $user->set_alias($data["user"]);
    }
    $user->set_pass($data["passUser"]);
    
    print_r($user) ;
    echo $user->findUsu();

    /*
    if($ilUsuario->findUsu()){
        echo "paso";
    }else{
        echo "no paso";
    }
    */
    
    
}

?>