<?php
    session_start();
    include "../controller/cerraduraBD.php";
    include "../controller/usuarioBD.php";


    if(isset($_POST["a"]) && isset($_SESSION["usuario"])){
       
        $user  = $_SESSION["usuario"];
        //print_r($user);
        if($user[4]==0){
            
            echo 1;
        }else if($user[4]==1){
            
            $cerradura = new cerraduraBD (null,null,null,null,null,null,null,null);
            $cerradura->set_id_usuario_cerradura($user[0]);
            $json = $cerradura->jsonCerraduraPorId();
            
            print_r($json);  
        }
    }
    
    if (isset($_POST["serial"]) && isset($_SESSION["usuario"]) && !empty($_SESSION['usuario'])){
        $data = $_POST['serial']; // dataVerif
        $user = $_SESSION["usuario"];
        $cerradura = new cerraduraBD (null,null,null,null,null,null,null,null);
        //print_r($user); 
        if($user[0] != "" && $data !="" ){
            $cerradura->set_serial_cerradura($data);        
            //print_r($cerradura);  
            
            if($cerradura->validarCerradura()){
                $cerradura->set_id_usuario_cerradura($user[0]);
                $cerradura->set_estado_cerradura(1);
                if($cerradura->cambiarUsuarioEstadoCerradura()){
                    //print_r($cerradura);
                    $usuario = new usuariosDB ($user[0],null,null,null,null,null,null,null,1);
                    if($usuario->modificarEstadoUsuario()){
                        $user[4] = 1;
                        $_SESSION["usuario"] = $user;
                        echo 1; // paso
                    }else{
                        echo 0; // no modifico usuario
                    }
                }else{
                    echo -3; // no cambio el estado de la cerradura
                }
            }else{
                echo -2; //no cerradura
            }

            //print_r($cerradura);
        }else{
            echo "datos";
        }
        
    }
    

?>