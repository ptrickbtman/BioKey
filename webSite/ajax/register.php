<?php

include '../controller/usuarioBD.php';
include '../controller/hashToSalted.php';
include "../controller/validacionTxtNumEmail.php";

if ( isset($_POST['dataRegis']) ) {
    $count = 0;
    $data = $_POST['dataRegis'];
    $ilUsuario = new usuariosDB(null,null,null,null,null,null,null,null,null);
    
    $ilUsuario->set_email($data["email"]); 
    $ilUsuario->set_alias($data["usuario"]); 
    $ilUsuario->set_name($data["nombre"]); 
    $ilUsuario->set_surname($data["apellido"]); 
    $ilUsuario->set_cell($data["num"]); 
    $ilUsuario->set_pass(hashData($data["pass1"])); 
    $ilUsuario->set_date(date("m-d-y")); 
    $ilUsuario->set_estado(3);

    if($ilUsuario->buscarUsuarioRegEmail() ){
    }else{
        $count +=1;
        echo -2; // registrado x email
    }

    if($ilUsuario->buscarUsuarioRegUser()){
        
    }else{
        $count +=1;
        echo -3; //registrado por alias 
    }

    if ($count ==0){
        if($ilUsuario->insertUsu()){
            echo 1;
        }else{
            echo -1; // error de metodo insertar
        }
    }
    
   
    
                    
}

?>