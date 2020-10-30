<?php

include '../controller/usuario.php';
include '../controller/hashToSalted.php';
include "../controller/validacionTxtNumEmail.php";

if ( isset($_POST['dataRegis']) ) {
    $data = $_POST['dataRegis'];
    $ilUsuario = new usuariosDB(null,null,null,null,null,null,null,null,null);
    if(validarEmail($data["email_usu"])){
        if(!empty($data["alias_usu"])){
            if(validarLetras($data["nombre_usu"])){
                if(validarLetras($data["apellido_usu"])){
                    if($data["pass1_usu"] == $data["pass2_usu"]){
                        $ilUsuario->set_email($data["email_usu"]); 
                        $ilUsuario->set_alias($data["alias_usu"]); 
                        $ilUsuario->set_name($data["nombre_usu"]); 
                        $ilUsuario->set_surname($data["apellido_usu"]); 
                        $ilUsuario->set_cell($data["num_usu"]); 
                        $ilUsuario->set_pass(hashData($data["pass1_usu"])); 
                        $ilUsuario->set_date(date("m-d-y")); 
                        $ilUsuario->set_estado(3); 
                        if($ilUsuario->insertUsu()){
                            echo 1;
                        }
                    }else{
                        echo "pass";
                    }  
                }else{
                    echo "ape";
                }  
            }else{
                echo "nom";
            }  

        }else{
            echo "alias";
        }  
    } else{
        echo "ema";
    }   
}

?>