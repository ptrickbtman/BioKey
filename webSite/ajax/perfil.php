<?php
    session_start();
    include "../controller/cerraduraBD.php";
    include "../controller/usuarioBD.php";

    if (isset($_POST["codigoProducto"]) && isset($_SESSION["usuario"]) && !empty($_SESSION['usuario'])){
        
        $data = $_POST['codigoProducto']; // dataVerify
     
        $user = $_SESSION["usuario"];
        $cerradura = new cerraduraBD (null,null,null,null,null,null,null);
        //print_r($user);

        
        if($user[0] != "" && $data["dataVerify"] !="" ){

            $cerradura->set_cod_cerradura($data["dataVerify"]);          
            if($cerradura->validarCerradura()){
                $cerradura->set_id_usuario_cerradura($user[0]);
                $cerradura->set_estado_cerradura(3);
                if($cerradura->cambiarUsuarioEstadoCerradura()){
                    $usuario = new usuariosDB ($user[0],null,null,null,null,null,null,null,2);
                    if($usuario->modificarEstadoUsuario()){
                        $user[4] = 2;
                        $_SESSION["usuario"] = $user;
                    }else{
                        echo "no paso usuario";
                    }
                }else{
                    echo "no cambio cerradura";
                }

            }else{
                echo "No cerradura";
            }
        }else{
            echo "datos";
        }
    }else{
        echo "No post";
    }

?>